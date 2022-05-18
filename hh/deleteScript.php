<?php


  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "doit";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // sql to delete a record
 $Gymid=$_GET['id'];

  $sql = "DELETE FROM gym_info WHERE id=$Gymid";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('delete is done successfully');
    window.location.href = 'admin.php'; 
    </script>";}
  else{
         echo "<script>alert('Error deleting record: . $conn->error');</script>";  
    // echo ;
  }
  
  $conn->close();
  ?>

