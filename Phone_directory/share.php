<html>

<head>
<title="Registration">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	session_start();



if(Isset($_SESSION["name"])){
echo'

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MyDirectory</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/Phone_directory/add_contact.php">Add Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="http://localhost/Phone_directory/logOut.php">LogOut</a>
      </li>
    </ul>
    
  </div>
</nav>



';

$servername = "localhost";
$username = "root";
$password = "";
$database="phone_book";

$dbc=new mysqli($servername, $username, $password,$database);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} 
else{
}


$id=$_SESSION["Id"];

$result=mysqli_query($dbc,"select count(contact_id) as total from contacts where id=$id");


$value=mysqli_fetch_assoc($result);
$contacts=$value['total'];



$result1=mysqli_query($dbc,"select * from contacts where id=$id");


echo "<div style='position: relative;
 margin: auto;
  top: 50px;
  right: 0;
  bottom: 0;
  
  width: 1000px;
  height: 100px;'> ";
  echo '<b>Total number of contacts   '.$contacts.'</b>';
  

echo "<table border =\"1\" style='border-collapse: collapse;width:100%'>";
echo '<tr> 

<th id="Id"> Id</th>
<th id="name">Name</th>
   <th id="phone">Number</th>

        <th id="Share">Share with</th>

  </tr>';
  
  
while($row = mysqli_fetch_array($result1))
{ //shared contact data
	$id=$_GET['id'];
	$name=$_GET['name'];
	$number=$_GET['number'];
	$email=$_GET['email'];
	//sharing with
$c_id=$row['contact_id']; 
 $c_name=$row['name'] ;
 	
echo "<tr>";
echo "<td>" . $row['contact_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['number'] . "</td>";

//sending data
$url="http://localhost/Phone_directory/shared.php?id=$id&name=$name&number=$number&email=$email&s_id=$c_id&s_name=$c_name"; 

echo "<td> <a href='$url'>Click here</a>  </td>";

echo "$c_id";

echo "</tr>";
}
echo "</table>";
echo '</div>';
}


else
{
	echo 'User authentication required';
	
	
	
}



?>



</body>


</html>