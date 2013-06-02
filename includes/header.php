<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Friends with benefit$</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<script src="js/jquery.js"></script> 
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		color: #fff;
		background-color: black;
      }
	  
	  .circular 
	  {
		width: 200px;
		height: 200px;
		border-radius: 150px;
		-webkit-border-radius: 150px;
		-moz-border-radius: 150px;
		}
    </style>
	
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.person').hover(function()
		{
			 $(this).animate({
				width: '+=10',
				left: '-=5',
				top: '-=5',
				height: '+=10'
				}, 200, function() {
				// Animation complete.
			});	
			
			 $(this).children().animate({
				width: '+=5',
				left: '+=5',
				top: '-=0',
				height: '+=5'
				}, 200, function() {
				// Animation complete.
			});	
			
		},function()
		{
			 $(this).animate({
				width: '-=10',
				left: '+=5',
				top: '+=5',
				height: '-=10'
				}, 400, function() {
				// Animation complete.
			});
			
			 $(this).children().animate({
				width: '-=5',
				left: '-=5',
				top: '+=0',
				height: '-=5'
				}, 400, function() {
				// Animation complete.
			});
			
		}); 
	});
</script>

<style type="text/css">
.person
{
	position: relative; 
	border-radius: 150px; 
	background-color: #ff4; 
	width: 180px; 
	height: 180px; 
	margin-left: 30px;
	margin-bottom: 30px;
	float: left;
}

.person img
{
	width: 90px; 
	border-radius: 100px; 
	position: relative; 
	left: 46px; 
	top: 10px;
}

.person div
{
	width: 180px;
	text-align: center;
	font-size: 28px;
	color: black;
	margin-top: 20px;
}
</style>

    <link href="css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">FRIENDS WITH BENEFIT$</a>
          <!-- <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse --> 
        </div>
      </div>
    </div>

    <div class="container">