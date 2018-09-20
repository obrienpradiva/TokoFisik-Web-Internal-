<html>
<head>
	<title>Staff Keuangan</title>
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
		width:100%;
		background-color:cadetblue;
		opacity:0.7;
	}
	#content
	{
		height:68.6%;
		width:100%;
		margin:0;
	}
	#isi
	{
		width:100%;
		opacity:0.9;
		margin-left:0px;
		color:white;
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
		opacity:0.7;
		z-index:1;
	}
	.w3-myfont 
	{
		font-family: "Comic Sans MS", cursive, sans-serif;
	}
	.btn
	{
		width:15%;
		height:10%;
	}
	ul 
	{
		list-style-type: none;
		width:100%;
		margin:0px;
		margin-bottom:3%;
		padding:0px;
		overflow: hidden;
		background-color: #333;
	}
	li 
	{
		width:33.3%;
		float: left;
	}
	li a
	{
		width:100%;
		
	}
	li a, .dropbtn 
	{
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	li a:hover, .dropdown:hover .dropbtn 
	{
		background-color : green;
	}
	li.dropdown 
	{
		display: inline-block;
		
	}
	.dropdown-content 
	{
		width:25%;
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}
	.dropdown-content a 
	{
		width:100%;
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}
	.dropdown-content a:hover 
	{
		background-color: green;
	}
	.dropdown:hover .dropdown-content 
	{
		display: block;
		background-color: #f1f1f;
	}
	.asd
	{
		
		padding-top:5px;
		padding-bottom:5px;
		margin-top:1%;
		margin-bottom:1%;
		width:50%;
	}
	</style>
</head>

<body>
<center>
	<div id="judul" class="w3-container w3-myfont">
		<div align="left" id="logo" class="w3-container w3-myfont">
			<img src="image/logo.png" style="width:100%;height:100%;">
		</div>
		<div id="teksJudul" class="w3-container w3-myfont">
			<p style="float:left;" class="w3-jumbo">TOKO FISIK ONLINE</p>
		</div>
		<div id="logout" class="w3-container w3-myfont">
			<?php
					session_start();
					$mysqli = new mysqli("localhost", "root", "", "tokofisik");
					if($mysqli -> connect_errno)
					{
						echo "Failed to connect to MySQL:
						{" . $mysqli->connect_errno . "} " . $mysqli->connect_error;
					}
					else
					{
						if($_SESSION["jabatan"]==1)
						{
							echo "<p>Staff Produk dan Toko Fisik</p>";
						}
						else
						{
							echo "<p>Staff Keuangan</p>";
						}
					}
			?>
			<a href="index.php">LogOut</a>
		</div>
	</div>
		<ul>
			<?php
				if($_SESSION["jabatan"]==1)
					{
						echo "<li><a href='staff_barang.php'>Home</a></li>
							<li class='dropdown'>
							<a href='javascript:void(0)' class='dropbtn'>Menu</a>
							<div class='dropdown-content'>
								<a href='review_toko.php'>Verifikasi Toko Fisik</a>
								<a href='review_produk.php'>Verifikasi Produk Toko</a>
							</div>
							</li>";
					}
					else
					{
						echo "<li><a href='staff_keuangan.php'>Home</a></li>
							<li class='dropdown'>
							<a href='javascript:void(0)' class='dropbtn'>Menu</a>
							<div class='dropdown-content'>
								<a href='data_rekening.php'>Data Rekening Member</a>
								<a href='laporan_member_premium.php'>Laporan Membership</a>
								<a href='#'>Laporan Penjualan Online</a>
							</div>
							</li>";
					}
			?>
			<li class="dropdown">
			<a href="profile.php" class="dropbtn">Profile</a>
			</li>
		</ul>
</center>
		
<center>
	<div id="content" class="w3-container">
		<div id="topContent" class="w3-container">
			<form method="POST" action="add_rekening.php">
				<input class="asd w3-input w3-validate" type="text" placeholder="Nama Bank" name="nama" required></input>
				<input class="asd w3-input w3-validate" type="text" placeholder="Pemilik" name="pemilik" required></input>
				<input class="asd w3-input w3-validate" type="text" placeholder="Nomor Rekening" name="noRek" required></input>
				
				</br>
				
				<input class="btn w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" value="SAVE"></input>
			</form>
			
			<?php
			if(isset($_POST['nama']))
			{
				
					$sql = "delete from rekening where ";
					$result = $mysqli->query($sql);
					if($result)
					{
						echo "<span style='color:white;' class='w3-card w3-teal'><b>Rekening Berhasil Diupdate</b></span>";
					}
					else
					{
						echo "<span style='color:white;' class='w3-card w3-red'><b>Error Updating Rekening</b></span>";
					}
			}
			?>
		</div>
	</div>
	<div id="content" class="w3-container">	
		<div id="isi" class="w3-container">
			
		</div>
	</div>
</center>
<center>
	<div id="groupMark" class="w3-container">
		<p>&copy; 2017 Zubir's Team - Pencarian Toko Fisik</p>
	</div>
</center>
</body>

</html>

<script>
	w3.slideshow(".slide", 3000);
</script>