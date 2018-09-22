<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="phone_book";

$dbc=new mysqli($servername, $username, $password,$database);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} 
else{
echo 'connection successful';
}


$name=trim(strip_tags($_POST["Name"]));
$Password=trim(strip_tags($_POST["Pass"]));
$phoneno=trim(strip_tags($_POST["phoneno"]));


if(Isset($_POST)){

if(mysqli_query($dbc,"INSERT INTO user_data (name,password1,phoneno) 
VALUES ('$name','$Password',$phoneno)")==TRUE){


echo "data should be inserted";
mysqli_close($dbc);
header("Location: http://localhost/Phone_directory/Signin.html");

}






}

else{

echo"Something went wrong";
}












?>