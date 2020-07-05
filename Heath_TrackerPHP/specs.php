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
        
        
        <title>to do</title>

        
    </head>
    <style>
    h4{
        font-family:cursive;
    }
    </style>
    <body>
<?php
    include 'header.php';
 
  session_start();
  $con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));

  $food=$_POST['food2'];
  $protein=0;
  $weight=0;
  $select_query1="select * from user where id=".$_SESSION['id'];
  $result1=  mysqli_query($con, $select_query1) or die(mysqli_error($con));
  $row1=mysqli_fetch_array($result1);
  $weight=$row1['weight'];
  $select_query="select * from foodstuff where description='$food'";
  $result=  mysqli_query($con, $select_query) or die(mysqli_error($con));

$row=mysqli_fetch_array($result);
$protein=$row['proteins'];
//echo $protein;
?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    function safe(){
   var w=100;
   var pro='<?php echo $protein; ?>' ;
   var weight='<?php echo $weight; ?>' ;
    //var e=parseINT(a);
    //console.log(a);
    
    var e=parseInt(pro);
    var wei=parseInt(weight);
    console.log(typeof(wei));
    console.log(wei);
    
    
    

    if(e > w && wei>70){
        document.getElementById("suggestion").innerHTML = "Not Healthy for people above 70 kg!"+"<br>"+"You need to lose:"+(wei-70)+" kgs"+"<br>"+"All the Best!";
    }
    else{
        document.getElementById("suggestion").innerHTML = "Healthy!";
    }}
    </script>
<div class="row jumbotron"><div class="col-md-offset-4 col-md-4 col-xs-12">
<center><h2 style="font-family:garamond">Nutrient Content: </h2><br><center>
<h4 style="font-family:garamond">Protein: <?php echo $row['proteins'] ?></h4><br>
<h4 style="font-family:garamond">Fats: <?php echo $row['fats'] ?></h4><br>
<h4 style="font-family:garamond">Carbohydrates: <?php echo $row['carbs'] ?></h4><br>
<h4 style="font-family:garamond">Calories: <?php echo $row['energy'] ?></h4><br>
<center><h3 style="font-family:garamond;color:red">For personalized suggestion:</h3></center><br>
<center><button onclick="safe()" class="btn btn-danger btn-rounded">Is it healthy?</button></center></div></div><br>
<div class="jumbotron"><center><h2 id="suggestion" style="font-family:garamond;color:red"></h2></center></div>
<h2 id="suggest" style="font-family:garamond;color:blue"></h2></center></div>
</body>
</html>