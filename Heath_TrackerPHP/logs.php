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
<nav className=" red darken-2">
<div className="container">
    <a className="brand-logo">Healthy life</a>
    <ul class="right">
        <li><a href="food_specs.php">Food specs</a></li>
        <li><a href="logout.php">Log out</a></li>
        
        
        
    </ul>
</div></nav>
<?php  session_start();
$protein=0;
$fats=0;
$carbs=0;
$energy=0;
$water1=0;
$con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));
$food2=$_POST['food2'];
$water=$_POST['water'];
$date = date('Y-m-d');
 
$select_query="select id from foodstuff where description='$food2'";
$result=  mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result) or die(mysqli_error($con));
//echo $_SESSION['id'];
$insert_query = "insert into food_logs(foodstuff_id,user_id,water,date) values (".$row['id'].",".$_SESSION['id'].",$water,NOW())";
$user_reg_submit = mysqli_query($con, $insert_query) or die(mysqli_error($con));


// $foodstuff_select="select * from foodstuff where id=".$row['id'];
// $res=mysqli_query($con, $foodstuff_select) or die(mysqli_error($con));
// $row1=mysqli_fetch_array($res) or die(mysqli_error($con));

$food_logs_select="select * from food_logs where DATE(date)=CURDATE() and user_id=".$_SESSION['id'] ;
$res=mysqli_query($con, $food_logs_select) or die(mysqli_error($con));
while($row2=mysqli_fetch_array($res)){
$qu="select * from foodstuff where id=".$row2['foodstuff_id'];
$resu=mysqli_query($con, $qu) or die(mysqli_error($con));
$row3=mysqli_fetch_array($resu) or die(mysqli_error($con));
$protein+=$row3['proteins'];
$carbs+=$row3['carbs'];
$energy+=$row3['energy'];
$fats+=$row3['fats'];
$water1+=$row2['water'];
}
//echo $water1;







?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
       console.log("*");
       var w=100;
       var x='<?php echo $protein; ?>' ;
       var y='<?php echo $fats; ?>' ;
       var z='<?php echo $carbs; ?>' ;
       var a='<?php echo $energy; ?>' ;
       var water='<?php echo $water1; ?>' ;
       console.log(y);
       console.log(z);
       console.log(a);
       var pro=parseInt(x);
       var fats=parseInt(y);
       var carbs=parseInt(z);
       var energy=parseInt(a);
       var wa=parseInt(water);
       console.log(typeof(pro));
       console.log(typeof(fats));
       console.log(typeof(carbs));
       console.log(typeof(energy));
       function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nutrients", "Kcal per day", { role: "style" } ],
        ["Protein", pro, "#b87333"],
        ["Fats", fats, "silver"],
        ["Energy", carbs, "gold"],
        ["Carbs", energy, "color: #e5e4e2"]
      ]);

     
        var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "My updated nutrient intake, in Kcal",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

        chart.draw(data, options);
        if(wa<w)
        {
          document.getElementById("intake").innerHTML="<center>"+"Warning!"+"</center>"+"<br>"+"<center>"+"Drink more water:"+(w-wa)+" litres."+"</center>";
        }
        else{
          document.getElementById("int").innerHTML="<center>"+"Hurray!"+"</center>"+"<br>"+"Adequate water ";
        }
      }
    </script>
    <?php
   $con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));
   $select_query2="select * from foodstuff";
   $result2=  mysqli_query($con, $select_query2) or die(mysqli_error($con));
   

  ?>
  <?php
   $con = mysqli_connect("localhost", "root", "", "coders") or die(mysqli_error($con));
   $select_query3="select * from foodstuff";
   $result3=  mysqli_query($con, $select_query3) or die(mysqli_error($con));
   

  ?><div class="">
   <div class="row"><div class="col-md-6 col-xs-12"><div id="columnchart_values" style="width: 900px; height: 300px;"></div></div><div class="jumbotron col-md-3" >
   <center><h4 style="font-family:garamond;color:green" >Suggested food:</h4>
   <ul type="circle"><?php while($row2=mysqli_fetch_array($result2)) {?>
   <?php if($row2['proteins']<100) {?>
   <li style="font-size:30px;font-family:garamond;margin-left:35px"><?php echo $row2['description']; ?></li> <?php } ?> <?php } ?>
   </ul>
   </center>
   </div> <div class="col-md-3 col-xs-12 jumbotron"  ><h4 style="font-family:garamond;color:red" >Not Suggested food:</h4>
   <ul type="circle" ><?php while($row3=mysqli_fetch_array($result3)) {?>
   <?php if($row3['proteins']>100) {?>
   <li style="font-size:30px;font-family:garamond;margin-left:35px"><?php echo $row3['description']; ?></li> <?php } ?> <?php } ?>
   </ul>
     </div></div>
   <center><div class="col-xs-12 col-md-offset-4 col-md-4"></div>
  <a href="food_specs.php"><button type="submit" class="btn peach-gradient">Food specs</button></a></center></div>
    <div class="row jumbotron"><br>
  <center>  <div class="col-xs-12 col-md-offset-3 col-md-6">
    <h3 id="intake" style="color:red ;font-family:bookman"></h3></div></center>
   <center> <div class="col-xs-12 col-md-offset-4 col-md-4">
    <h3 id="int" style="color:blue ;font-family:bookman"></h3></div></center>
</div>
</body>
</html>