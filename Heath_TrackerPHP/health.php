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
        <div class="container-fluid" style="background:">
           
        <nav class=" red darken-1">
<div class="container">
    <a class="brand-logo" href="index.php">Healthy life</a>
    <ul class="right">
        
        <li><a href="logout.php">Log out</a></li>
        <li><a href="food_specs.php">Food specs</a></li>

        
        
        
    </ul>
</div class="container"></nav><div class="center" style="margin-bottom:40px;border:4px"><center><div style="box-shadow:10px 10px 10px grey;background:Azure;margin-top:15px;border-radius:8px"><h4 style="font-family:AvantGarde;padding:20px;;">Today's Health Track</h4></div></center></div>
       <br> <div class="row">
        <div class=" col-md-offset-3 col-md-6 col-xs-12" >
        <div style="box-shadow:10px 10px 10px grey;border-style:solid;border-width:1px;border-left-width:17px;background:">
                    <form method="post" action="logs.php" style="margin-left:30px;margin-right:30px" >
                    <center><h4 style="font-family:garamond;color:black;padding:10px;text-shadow:2px 2px 4px grey ">Add your intake</h4></center> 
                         <br> <div class="form-group"><label for="food"></label>
                             <input type="text" class="form-control" id="food2" placeholder="Food" name="food2">
                             <label for="water"></label>
                             <input type="number" class="form-control" id="water" placeholder="Water intake in litres" name="water">
                        </div>
                        
                        <center><button type="submit" class="btn btn-danger btn-rounded">Add</button></center><br>
                         
                    </form></div></div></center></div><div class="row>"
               <div class="col-md-offset-3 col-md-6 col-xs-12 container"><div style="box-shadow:10px 10px 10px grey;margin-bottom:50px;height:500px;border-style:solid;border-width:1px;border-left-width:17px"> <center>    <h4 style="font-family:garamond;color:black;padding:10px;text-shadow:2px 2px 4px grey ">Current Nutrient Intake in Kcal</h4></center>
    <div id="columnchart_values" style="margin-left:60px"></div></div></div>
                    </div>
     

    

                    
                </div></div>
            
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

$food_logs_select="select * from food_logs where DATE(date)=CURDATE() and user_id=".$_SESSION['id'] ;
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







?><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
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
        ["Nutrients", "Kcal per day", { role: "style" } ],
        ["Protein", pro, "LightCoral"],
        ["Fats", fats, "PeachPuff"],
        ["Energy", carbs, "SeaGreen"],
        ["Carbs", energy, "color: SlateGrey"]
      ]);

     
        var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "",
        width: 600,
        height: 400,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      if(wa<w)
        {
          document.getElementById("intake").innerHTML="<center>"+"Warning!"+"</center>"+"<br>"+"<center>"+"Drink more water:"+(w-wa)+" litres."+"</center>";
        }
        else{
          document.getElementById("int").innerHTML="<center>"+"Hurray!"+"</center>"+"<br>"+"Adequate water ";
        }
      }
    </script></div>
</body>
</html>
    </body>
</html>