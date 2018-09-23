<html>


<body>
<?php
	session_start();



if(Isset($_SESSION["name"])){

echo ' i am not gonna run';


echo '<a href="http://localhost/Phone_directory/logOut.php">Logout </a>';

}
else
{
	echo 'User authentication required';
	
	
	
}



?>



</body>


</html>