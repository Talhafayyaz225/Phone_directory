

<html>
<title="Sigin">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<style>
.center-div
{
  position: relative;
 margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 130px;
  width: 500px;
  height: 100px;

  
  
}
.error {color: #FF0000;}
</style>

<body>
<?php

session_start();

$nameErr = $passErr =$Error ="";
$name=$pass="";
$tag="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

if(empty($_POST["Name"])){
$nameErr="Name is reuired";
$tag=FALSE;
}
else{
$name=trim(strip_tags($_POST["Name"]));
$tag=TRUE;
if(!preg_match("/^[a-zA-Z ]*$/",$name)){
$nameErr="Name can only contain letters and whitespaces";
$tag=FALSE;}

}}

if(empty($_POST["Pass"])){
$passErr="Password is required";
$tag=FALSE;}
else{
$pass=trim(strip_tags($_POST["Pass"]));
$tag=TRUE;
if(strlen($pass)>8){
$passErr="Password can only contain 8 ";
$tag=FALSE;}
}

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

if(Isset($_POST)){
if(tag==TRUE){


$result=mysqli_query($dbc,"select * from user_data where name='$name'and password1='$pass' limit 1");

$c=mysqli_fetch_array($result);
if(Isset($c)){
	echo'success';
mysqli_close($dbc);
	
}


else{

$Error="Name or Password is incorrect ";


}
}
}



?>
<div id="main_div" style="width:90%;height:500px;border:solid;margin-left:50px;border-radius: 20px;border-color:#0090b8">
<div class="center-div">
<pre><h1 style="color:#0090b8">   Sign In</h1></pre>


<p><span class="error">* required field</span></p>
<form  method="post"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
 
<pre>Name:       <input type="text" name="Name" value="<?php echo $name;?>"></input> <span class="error">* <?php echo $nameErr;?></span> </pre>
 <pre>Password:   <input type="password" name="Pass" value=""></input> </pre> <span class="error">* <?php echo $passErr;?></span>
<pre>                          <input type="submit" value="login" class="btn btn-primary">
<span class="error">* <?php echo $Error;?></span></pre>

</form>
</div>
</div>
</body>
</html>