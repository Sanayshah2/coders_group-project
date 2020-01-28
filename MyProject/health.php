<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
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
        <div class="container-fluid uhk">
           
        <nav className=" red darken-2">
<div className="container">
    <a className="brand-logo" href="index.php">Healthy life</a>
    <ul class="right">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Log out</a></li>
        
        
        
    </ul>
</div></nav>
        <div class="row">
        <div class="col-md-offset-4 col-md-3 col-xs-12">
                    <form method="post" action="logs.php" >
                       
                          <div class="form-group"><label for="food"></label>
                             <input type="text" class="form-control" id="food2" placeholder="Food" name="food2">
                             <label for="water"></label>
                             <input type="number" class="form-control" id="water" placeholder="Water intake in litres" name="water">
                        </div>
                        
                        <button type="submit" class="btn-group-justified btn-group-lg">Add</button>
                         
                    </form></div></div>
     

    

                    
                </div>
            </div>
        </div>
        </div><div>
        <?php 
         //session_start();
$protein=0;
$fats=0;
$carbs=0;
$energy=0;
$con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));
// $food2=$_POST['food2'];
// $select_query="select id from foodstuff where description='$food2'";

// $result=  mysqli_query($con, $select_query) or die(mysqli_error($con));
// $row=mysqli_fetch_array($result) or die(mysqli_error($con));
// //echo $_SESSION['id'];

// $insert_query = "insert into food_logs(foodstuff_id,user_id) values (".$row['id'].",".$_SESSION['id'].")";
// $user_reg_submit = mysqli_query($con, $insert_query) or die(mysqli_error($con));

// $foodstuff_select="select * from foodstuff where id=".$row['id'];
// $res=mysqli_query($con, $foodstuff_select) or die(mysqli_error($con));
// $row1=mysqli_fetch_array($res) or die(mysqli_error($con));

$food_logs_select="select * from food_logs where user_id=".$_SESSION['id'];
$res=mysqli_query($con, $food_logs_select) or die(mysqli_error($con));
while($row2=mysqli_fetch_array($res)){
$qu="select * from foodstuff where id=".$row2['foodstuff_id'];
$resu=mysqli_query($con, $qu) or die(mysqli_error($con));
$row2=mysqli_fetch_array($resu) or die(mysqli_error($con));
$protein+=$row2['proteins'];
$carbs+=$row2['carbs'];
$energy+=$row2['energy'];
$fats+=$row2['fats'];
}







?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
       console.log("*");
       var x='<?php echo $protein; ?>' ;
       var y='<?php echo $fats; ?>' ;
       var z='<?php echo $carbs; ?>' ;
       var a='<?php echo $energy; ?>' ;
       console.log(y);
       console.log(z);
       console.log(a);
       var pro=parseInt(x);
       var fats=parseInt(y);
       var carbs=parseInt(z);
       var energy=parseInt(a);
       console.log(typeof(pro));
       console.log(typeof(fats));
       console.log(typeof(carbs));
       console.log(typeof(energy));

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nutrients', 'Kcal per day'],
          ['Protein',  pro ],
          ['Fats',     fats ],
          ['energy',  carbs],
          ['Carbs',  energy    ],
        ]);

        var options = {
          title: 'My Current Nutrient Intake.'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    </center><div id="piechart" style="width: 900px; height: 500px;"></div></center>
</body>
</html>
    </body>
</html>