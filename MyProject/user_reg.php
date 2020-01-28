<?php  session_start();
$con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));
$fname= $_POST['fname'];
$email=$_POST['email'];
$pass=$_POST['password'];
$cont=$_POST['contact'];



$user_reg_query = "insert into user(username,email , password,contact) values ('$fname', '$email', '$pass','$cont')";
$user_reg_submit = mysqli_query($con, $user_reg_query) or die(mysqli_error($con));
$_SESSION['id']=mysqli_insert_id($con);
header('location:health.php');

?>



