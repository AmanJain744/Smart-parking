 <!-- <?php
$con=mysqli_connect("localhost", "root", "", "vpmsdb");
if(mysqli_connect_errno()){
  echo "HELLO";
echo "Connection Fail".mysqli_connect_error();
}

  ?> -->
  <?php

  /**
   * @author aman
   * @copyright 2019
   */

  class dbconfig {
    // echo "hello";
      //database hostname
      protected static $host = "localhost";
      protected static $username = "root";
      protected static $password = "";
      protected static $dbname = "vpmsdb";

      public static $con;

      function __construct(){
          self::$con = self::connect();
      }

      //open connection
      protected static function connect(){
          try {
              $link = mysqli_connect(self::$host, self::$username, self::$password,self::$dbname);
              if(!$link){
                  throw new exception(mysqli_error($link));
              }
              return $link;
          } catch(Exception $e){
              echo "Error: " . $e->getMessage();
          }
      }

      public static function close(){
          mysqli_close(self::$con);
      }

      public static function run($query){
          try{
              if(empty($query) && !isset($query)){
                  throw new exception("Query Sring is not set.");
              }
              $result = mysqli_query(self::$con, $query);
              return $result;
          } catch(Exception $e){
              echo "Error: ".$e->getMessage();
          }
      }
  }

  ?>
