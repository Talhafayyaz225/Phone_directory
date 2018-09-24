<html>
<head>
<title="Add Contact">
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
  left: 50px;
  width: 500px;
  height: 100px;

  
  
}
.error {color: #FF0000;}
</style>


<body>
<?php
session_start();

$nameErr =  $phErr =  "";
$name=$Email=$phoneno=$id="";
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

if(empty($_POST["Email"])){

$tag=FALSE;}
else{
$Email=trim(strip_tags($_POST["Email"]));
$tag=TRUE;

}



if(empty($_POST["phoneno"]))
{
$phErr="PhoneNo is required";
$tag=FALSE;}
else{
$phoneno=trim(strip_tags($_POST["phoneno"]));
$tag=TRUE;
if(strlen($phoneno)>11&&!preg_match("/^[03][0-9]{10}$/")){
$phErr="Password can only contain 11 digits and contain digits ";
$tag=FALSE;}
}

$id=$_SESSION["Id"];




$servername = "localhost";
$username = "root";
$password = "";
$database="phone_book";

$dbc=new mysqli($servername, $username, $password,$database);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} 


if(Isset($_POST)){
if($tag==TRUE){
if(mysqli_query($dbc,"INSERT INTO contacts (name,number,Email,id) 
VALUES ('$name','$Email',$phoneno,$id)")==TRUE){



mysqli_close($dbc);
header("Location: http://localhost/Phone_directory/user_panel.php");

}}}



?>







<div id="main_div" style="width:90%;height:500px;border:solid;margin-left:50px;border-radius: 20px;border-color:#0090b8">
<div class="center-div">
<img src="http://localhost/Phone_directory/add_contact_logo.png" style="width:100px;height:100px">
<h1 style="color:#0090b8">Add Contact</h1>
<p><span class="error">* required field</span></p>
<form  method="post"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
 
<pre>Name:       <input type="text" name="Name" value="<?php echo $name;?>"></input> <span class="error">* <?php echo $nameErr;?></span> </pre>
<pre>Email:      <input type="text" name="Email" value="<?php echo $pass;?>"></input> </pre> 
 
<pre>PhoneNo:    <input type="text" name="phoneno" value="<?php echo $phoneno;?>"></input> <span class="error">* <?php echo $phErr;?></span> </pre>
<pre>                          <input type="submit" value="Add" class="btn btn-primary"></pre>

</form>
</div>
</div>

</body>
</html>