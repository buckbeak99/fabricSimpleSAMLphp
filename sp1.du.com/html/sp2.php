<!DOCTYPE html>
<html>  
<head>
  <title>Identity Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .navbar-custom { 
    background-color: #30336b; 
}
.navbar-custom .navbar-brand, 
        .navbar-custom .navbar-text { 
            color: green; 
        } 
        .wrapper {
    margin-top: 80px;
    background-color: #eee;
    text-align: center;
    padding: 50px;
    margin-bottom: 30px;
}
.wrapper-2 {
    /* margin-top: 10px; */
    background-color: #eee;
    text-align: center;
    padding: 50px;
    /* margin-bottom: 100px; */
}
.button {
    position: absolute;
    top: 50%;
}
</style>
</head>
<body>
<div class="fluid">
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div>
        <span>

        </span>
    </div>
    <ul class="nav navbar-nav">
      <li> <a href="index.php">SP1</a></li> <span></span>
      <li class="active"><a href="#">SP2</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="">
      <button type="button" class="btn btn-primary">Logout</button>
    </form>
  </div>
</nav>
<div class="row">
  <div class="col-lg-4"></div>
<div class="col-lg-4"> 
<div class="wrapper">
  <button type="button" class="btn btn-primary btn-block" onClick="location.href=''" >Officer</button>
</div>
<div class="wrapper-2">
 <button type="button" class="btn btn-primary btn-block " onClick="location.href=''" href="">Manager</button>
 </div>
</div>
  <div class="col-lg-4"></div>
</div>
</div>
</body>
</html>
