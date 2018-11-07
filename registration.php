<?php
session_start();
// header('location:login.php');
$con=mysqli_connect('localhost','root');
if($con){
  echo "connection successful";
}else {
  echo "no connection";
}
mysqli_select_db($con ,'schoolora');
if (isset($_POST['email'])){
$name = $_POST['email'];
}
if (isset( $_POST['psw'])){
$pass = $_POST['psw'];
}
$q = "select * from users where user_name ='$name' && pass ='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num==1)
{
  echo "duplicate data";
}
else{
  $qy="insert into users (user_name,pass) values('$name','$pass')";
  mysqli_query($con,$qy);
}
?>
