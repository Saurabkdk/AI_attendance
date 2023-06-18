<?php

/**
*
*/
//class to connect to the database
class ConnectionDb
{

  //function for connection to database
  public function dbConnection()
  {
    try {

      //creating the PDO connection and storing in a variable
      $dbConnection = new PDO("mysql:host=localhost;dbname=attendance", "root", "");
      //showing error in case of Exception
      $dbConnection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //returning the connection
      return $dbConnection;

    } catch (PDOException $exception) {
      //In case data could not be connected, display error
      echo "Could not connect with the database : " . $exception->getMessage();
    }

  }
}


?>
