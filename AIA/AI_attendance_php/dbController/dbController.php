<?php 

//including the required database connection file
include 'dbConnection.php';

//creating an object of the class in dbConnection.php
$dbConnect = new ConnectionDb();
//get the connection in a variable for convenience
$dbConnection = $dbConnect -> dbConnection();


function getAllStudents($date){
    //getting the database connection
    global $dbConnection;
  
    try {
      //preparing the query to be executed
      $allStudents = $dbConnection->prepare('SELECT id, name, date, MIN(time) AS time, attendance FROM student_attendance WHERE date = :date GROUP BY id');
      //value required in the query
      $allStudentsValue =[
        'date' => $date
      ];
      //execution of the query
      $allStudents -> execute($allStudentsValue);
      //fetch the data from the database table
    //   if ($getStudents = $allStudents -> fetch()) {
        
        return $allStudents;
        
    //   }
    } catch (PDOException $exception) {
      //display the exception message
      echo $exception -> getMessage();
    }
    return false;
    //ending the PDO connection
    $dbConnection = null;
  }

?>