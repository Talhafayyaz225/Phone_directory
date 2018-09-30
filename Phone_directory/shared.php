



<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database="phone_book";

$dbc=new mysqli($servername, $username, $password,$database);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} 


if(Isset($_POST)){
$id=$_GET['id'];


$name=$_GET['name'];

$number=$_GET['number'];
 $email=$_GET['email'];
 
 $s_id=$_GET['s_id'];
 
 $s_name=$_GET['s_name'];
 
  $admin=$_SESSION["name"];


if(mysqli_query($dbc,"INSERT INTO shared (shared_id,shared_name,shared_number,shared_email,share_with_id,share_with_name,shared_by_name) 
VALUES ($id,'$name',$number ,'$email',$s_id,'$s_name','$admin')")==TRUE){



mysqli_close($dbc);
header("Location: http://localhost/Phone_directory/user_panel.php");

}}
?>