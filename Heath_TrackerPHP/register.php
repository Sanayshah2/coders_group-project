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
<div class="" style="background:">
           
        <nav class=" red darken-1">
<div class="container">
    <a class="brand-logo" href="index.php"><h4 style="font-family:AvantGarde;margin:10px">Healthy life</h4></a>
    <ul class="right">
        
        <li><a href="logout.php">Log out</a></li>
        <li><a href="food_specs.php">Food specs</a></li>

        
        
        
    </ul>
</div></nav><div class="col-xs-12 col-md-offset-3 col-md-6" style="margin-bottom:40px;border:4px"><center><div style="box-shadow:10px 10px 10px grey;background:Azure;margin-top:15px;border-radius:8px"><h4 style="font-family:Courier;padding:20px;;">Register</h4></div></center></div>
       <br> <div class="row">
        <div class="col-md-offset-1 col-md-4 col-xs-12" >
        <div style="box-shadow:10px 10px 10px grey;border-style:solid;border-color:darkgray;border-width:1px;border-left-width:17px;background:HoneyDew">
                    <form method="post" action="login_submit.php" style="margin-left:30px;margin-right:30px" >
                    <center><h4 style="font-family:Courier;color:black;padding:10px;text-shadow:2px 2px 4px grey ">Log in</h4></center> 
                         <br> <div class="form-group"><label for="email"></label>
                    <input class="form-control" id="email" type="text" placeholder="Email" name="email"></div>
                      <div class="form-group"><label for="password"></label>
                          <input class="form-control" id="password" type="password" placeholder="Password" name="password">
                        </div>
                        
                        <center><button type="submit" class="btn btn-danger btn-rounded">Submit</button></center><br><center><p style="font-family:courier;font-size:20px">For already registered users</p></center>
                         
                    </form></div></div>
                    <div class="col-md-offset-1 col-md-5 col-xs-12"><div style="box-shadow:10px 10px 10px grey;border-style:solid;border-left-color:Black;border-color:BlanchedAlmond;border-width:1px;border-left-width:17px;background:beige">
                    <center><h4 style="font-family:Courier;color:black;padding:10px;text-shadow:2px 2px 4px grey ">Sign up</h4></center>
                    <form method="post" action="user_reg.php" style="margin:35px">
                       
                       <div class="form-group"><label for="fname"></label>
                           <input type="text" class="form-control" id="name" placeholder="Name" name="fname">
                       </div>
                         <div class="form-group"><label for="email"></label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                       </div>
                         <div class="form-group"><label for="password"></label>
                             <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                       </div>
                         <div class="form-group"><label for="contact"></label>
                            <input type="number" class="form-control" id="contact" placeholder="Contact" name="contact">
                       </div>
                       
                       <div class="form-group"><label for="weight"></label>
                            <input type="number" class="form-control" id="weight" placeholder="Current weight" name="weight">
                       
                       <center><button type="submit" class="btn btn-danger btn-rounded">Submit</button></center>
                        
                   </form></div></div>
                   </div>
                    </div>
     

    

                    
                </div>
                </body>
                </html>