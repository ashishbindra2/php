<?php
$mysqli = new mysqli("localhost","journals","journals*001","users");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(isset($_POST['submit']) && $_POST['submit'] == "insert") {
  $sql = "INSERT INTO
  signup (fname,lname,email,mobile,hobby,dob,	gender) VALUES ('{$_POST["fname"]}',
    '{$_POST["lname"]}','{$_POST["email"]}','{$_POST["mobile"]}','{$_POST["hobby"]}',
    '22/4/2020','{$_POST["gender"]}')";

  if ($mysqli->query($sql) === TRUE) {
    header('location:home.php?insert=1');
  }else {
    // code...
    header('location:index.php?insert=0');
}
}
if( $_POST['submit'] == "delete" && isset($_GET['del'])) {
// sql to delete a record
$sql = "DELETE FROM submit WHERE id=".$_GET['del'];

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
 ?>
