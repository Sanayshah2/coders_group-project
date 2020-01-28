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
    <div class="container">
    <div class="jumbotron">
        <?php
        include 'header.php';
        ?><br><br>
        <div class="row" >
        <div class="col-md-offset-4 col-md-4 col-xs-12">
        <center><h3 style="font-family:cursive">Food Specifications</h3></center>
                    <form method="post" action="specs.php">
                       
                          <div class="form-group"><label for="food"></label>
                             <input type="text" class="form-control" id="food2" placeholder="food" name="food2">
                        </div>
                        
                        <button type="submit" class="btn-group-justified btn-group-lg">Specs</button><br><br><br>
                        <center><h4 style="font-family:cursive">Here you will know about nutrients in various food items!!</h4></center>
                    </form></div></div>
                    
        </div>
        </div>
        
    </body>
</html>