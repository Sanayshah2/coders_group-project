<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <title>to do</title>
    </head>
    <body>
<?php
$con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));

$food=$_POST['food2'];

$select_query="select * from foodstuff where description='$food'";
$result=  mysqli_query($con, $select_query) or die(mysqli_error($con));

$row=mysqli_fetch_array($result);

echo "Protein: ".$row['proteins']."<br>";
echo "Fats: ".$row['fats']."<br>";
echo "Carbohydrates: ".$row['carbs']."<br>";
echo "Calories: ".$row['energy']."<br>";
?>
</body>
</html>