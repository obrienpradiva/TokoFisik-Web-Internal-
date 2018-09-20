<html>
<head>
	<title>Staff Produk dan Toko Fisik</title>
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
	}
	#logo
	{
		height:100%;
		width:15%;
		float:left;
	}
	#teksJudul
	{
		height:100%;
		width:70%;
		float:left;
	}
	#logout
	{
		height:100%;
		width:15%;
		float:right;
		padding-top:2%;
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
		height:90%;
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
		width:90%;
		height:17%;
	}
	ul 
	{
		list-style-type: none;
		width:100%;
		margin:0px;
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
		width:33.3%;
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
	.invisible
	{
		display:none;
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
	<div id="content" class="w3-container">	
		<div id="namaContent" style="height:20%;" class="w3-container">
			<p style="float:left;" class="w3-xlarge">Verifikasi Daftar Toko</p>
			<center><img src="image/who.jpg" style="margin-top:1%;margin-right:13%;width:15%;height:100%;"></img></center>
		</div>
			
		<div id="isi" class="w3-container">
			<div id="bawah" style="width:100%;height:65%;" class="w3-container">
			<center><table class="w3-table" style="width:50%;color:black;margin-top:1%;">
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
						$sql = "SELECT * FROM tokoFisik WHERE nama_toko LIKE '%".$_POST['namaToko']."'%";
						$result = $mysqli->query($sql);
						if($result) 
						{
							$row = $result->fetch_array();
							echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
							echo "<tr><td>Nama Toko</td><td>".$row['nama_toko']."</td></tr>";
							echo "<tr><td>Nama Pemilik</td><td>".$row['nama_pemilik']."</td></tr>";
							echo "<tr><td>Provinsi</td><td>".$row['provinsi']."</td></tr>";
							echo "<tr><td>Kota</td><td>".$row['kota']."</td></tr>";
							echo "<tr><td>Alamat</td><td>".$row['alamat']."</td></tr>";
							echo "<tr><td>Deskripsi</td></tr>";
							echo "<tr rowspan='2'><td colspan='2'>".$row['deskripsi']."</td></tr>";
						}
					}
					
				?>
			</table>
			<table class="w3-table" style="width:50%;color:black;margin-top:1%;">
			<tr>
			<td>
			<form method="POST" action="review_toko.php">
			<input class="invisible w3-input w3-validate" type="text" name="result" value="acc"required></input>
			<input class="btn w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" onclick="location.href='review_toko.php';" value="Accept"></input>
			</form>
			</td>
			<td>
			<center>
			<form method="POST" action="review_toko.php">
			<input class="invisible w3-input w3-validate" type="text" name="result" value="pending"required></input>
			<input class="btn w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" onclick="location.href='review_toko.php';" value="Pending"></input>
			</form>
			</td>
			<td>
			<form method="POST" action="review_toko.php">
			<input class="invisible w3-input w3-validate" type="text" name="result" value="reject"required></input>
			<input class="btn w3-button w3-white w3-border w3-border-red w3-round-large" type="submit" onclick="location.href='review_toko.php';" value="Reject"></input>
			</form>
			</td>
			</tr>
			</table>
			</center>
			</div>
		</div>
	</div>
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