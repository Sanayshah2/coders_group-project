
<html>
    <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script src="script.js" type="text/javascript"></script>
    </head>
    <body>
    <div class ="container">
    <div class="jumbotron">
        <?php
include 'header.php';
?><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<div class="row">
    <div class="col-md-offset-4 col-md-4 col-xs-12">
        
    <center>  <form method="post" action="login_submit.php">
            <h3 style="font-family: cursive">LOGIN</h3><br>
              
                  <div class="form-group"><label for="email"></label>
                    <input class="form-control" id="email" type="text" placeholder="Email" name="email"></div>
                      <div class="form-group"><label for="password"></label>
                          <input class="form-control" id="password" type="password" placeholder="Password" name="password"></div>
                <button type="submit" class="btn-group-justified btn-group-lg">SUBMIT</button>
                    
                
                </form></center>
        </div>
   </div>
   </div> 
</div>
        
    </body></html>