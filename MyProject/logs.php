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
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Log out</a></li>
        
        
        
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
$select_query="select id from foodstuff where description='$food2'";

$result=  mysqli_query($con, $select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result) or die(mysqli_error($con));
//echo $_SESSION['id'];

$insert_query = "insert into food_logs(foodstuff_id,user_id,water) values (".$row['id'].",".$_SESSION['id'].",$water)";
$user_reg_submit = mysqli_query($con, $insert_query) or die(mysqli_error($con));


// $foodstuff_select="select * from foodstuff where id=".$row['id'];
// $res=mysqli_query($con, $foodstuff_select) or die(mysqli_error($con));
// $row1=mysqli_fetch_array($res) or die(mysqli_error($con));

$food_logs_select="select * from food_logs where user_id=".$_SESSION['id'];
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
echo $water1;







?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var w=100;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
       console.log("*");
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
          ['Nutrients', 'Kcal per day'],
          ['Protein',  pro ],
          ['Fats',     fats ],
          ['energy',  carbs],
          ['Carbs',  energy    ],
        ]);

        var options = {
          title: 'My Updated Nutrient Intake.'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        if(wa<w)
        {
          document.getElementById("intake").innerHTML="<center>"+"Warning!"+"</center>"+"<br>"+"<center>"+"Drink more water:"+"</center>"+(w-wa)+" litres.";
        }
        else{
          document.getElementById("int").innerHTML="<center>"+"Hurray!"+"</center>"+"<br>"+"Adequate water ";
        }
      }
    </script>
   <center><div id="piechart" style="width: 900px; height: 500px;"></div></center>
    <div class="row jumbotron">
    <div class="col-xs-12 col-md-6">
    <h2 id="intake" style="color:red ;font-family:cursive"></h2></div>
    <div class="col-xs-12 col-md-6">
    <h2 id="int" style="color:blue ;font-family:cursive"></h2></div>
</div>
</body>
</html>