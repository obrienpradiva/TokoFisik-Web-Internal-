<?php
	session_start();
	session_unset();
?>
<html>
<head>
	<title>Index Page</title>
	<link rel="stylesheet" href="lib/w3.css">
	<script src="lib/w3.js"></script>
	<style>
	body
	{
		background: url("image/brick.png") no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#judul
	{
		height:20%;
		background-color:cadetblue;
		opacity:0.7;
	}
	#content
	{
		
		height:94%;
	}
	#topContent
	{
		height:50%;
		width:100%;
	}
	#botContent
	{
		height:20%;
		width:100%;
	}
	.slide
	{
		width:100%;
		height:100%;
	}
	#groupMark
	{
		color:white;
		width:100%;
		height:6%;
		background-color:black;
		opacity:0.8;
		z-index:-1;
	}
	.w3-myfont 
	{
		font-family: "Comic Sans MS", cursive, sans-serif;
	}
	.btn
	{
		width:15%;
		height:17%;
	}
	</style>
</head>
<center>
<body>
	<!--
	<div id="judul" class="w3-container w3-myfont">
		<p class="w3-jumbo">PENCARIAN TOKO FISIK</p>
	</div>
	-->
	<div id="content" class="w3-container">
		<div id="topContent" class="w3-container">
			<img src="image/logo.png" style="width:40%;height:95%;">
		</div>
		<p class="w3-jumbo">TOKO FISIK ONLINE</p>
		<div id="botContent" class="w3-container">

			<input class="btn w3-button w3-white w3-border w3-border-red w3-round-large" type="button" onclick="location.href='login_page.php';" value="LOGIN"></input>
		</div>
		
		<!--
		<div id="botContent" class="w3-container">
			<div class="slide w3-animate-right">
				<img src="image/1.jpg" style="width:50%;height:95%;">
			</div>
			<div class="slide w3-animate-right">
				<img src="image/2.jpg" style="width:50%;height:95%;">
			</div>
			<div class="slide w3-animate-right">
				<img src="image/3.jpg" style="width:50%;height:95%;">
			</div>
		</div>
		-->
	</div>
	<div id="groupMark" class="w3-container">
		<p>&copy; 2017 Team Pencarian Toko Fisik - Sistem Informasi Pencarian Toko Fisik</p>
	</div>
</body>
</center>
</html>

<script>
	w3.slideshow(".slide", 5000);
</script>