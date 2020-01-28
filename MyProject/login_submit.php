
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));

    $email=$_POST['email'];
$pass=$_POST['password'];
$select_query="select * from user where email='$email' && password='$pass'";
$result=  mysqli_query($con, $select_query) or die(mysqli_error($con));
$num=  mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
$_SESSION['id']=$row['id'];

if ($num==1){
    
    
    // $_SESSION['id']=mysqli_insert_id($con);
    // echo $_SESSION['id'];
        header('location:health.php');
}

    

 else {
    echo "Incorrect id or password.";    
}




?>

