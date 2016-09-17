<?php require_once('Connections/koneksipasien.php'); ?>
<?php
mysql_select_db($database_koneksipasien, $koneksipasien);
$query_Recordset1 = "SELECT * FROM pasien";
$Recordset1 = mysql_query($query_Recordset1, $koneksipasien) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>About -Poliklinik UIN Bandung</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>`
<body>
	<div class="background">
		<div class="page">
			<a href="index.html" id="logo">Poliklinik UIN Bandung</a>
			<div class="sidebar">
				<ul>
					<li>
						<a href="../index.html">Home</a>
					</li>
					<li class="selected">
						<a href="../about.html">About</a>
					</li>
					<li>
						<a href="../contact.html">Contact</a>
					</li>
				</ul>
				<div class="first">
					<div>
						<h3>Sekilas Poliklinik UIN BDG</h3>
						<img src="images/uinedit.jpg" alt="" width="180" height="183">
					</div>
				</div>
				<div>
					<div>
						<h3> Poliklinik</h3>
						<p>&nbsp;</p>
					  <img src="images/Klinikedit.jpg" alt=""width="180"height="183">
						<p>Lokasi Poliklinik UIN Bandung dengan mengutamakan pelayanan dan kenyamanan pasien saat berobat</p>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="about">
					<div>
						<div>
							<div>
								<h3>SELAMAT DATANG DI POLIKLINIK UIN BANDUNG</h3>
								<p>Terima Kasih telah berobat dan mengunjungi Poliklinik</p>
							</div>
						</div>
				  </div>
</div>
						<div>
                        <body>
<p align="center">BIODATA PASIEN </p>
<table width="1099" border="1">
  <tr>
    <td width="137"><div align="center">
      <h5>Nama</h5>
    </div></td>
    <td width="122"><div align="center">
      <h5>NIM</h5>
    </div></td>
    <td width="122"><div align="center">
      <h5>TTL</h5>
    </div></td>
    <td width="57"><div align="center">
      <h5>Jenis Kelamin</h5>
    </div></td>
    <td width="149"><div align="center">
      <h5>Jurusan</h5>
    </div></td>
    <td width="154"><div align="center">
      <h5>Fakultas</h5>
    </div></td>
    <td width="144"><div align="center">
      <h5>Alamat</h5>
    </div></td>
    <td colspan="2"><div align="center">
      <h5>Action</h5>
    </div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><h5><?php echo $row_Recordset1['Nama']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['NIM']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['TTL']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['Jenis_Kelamin']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['Jurusan']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['Fakultas']; ?></h5></td>
      <td><h5><?php echo $row_Recordset1['Alamat']; ?></h5></td>
      <td width="78"><h5><a href="hapus.php?id_berobat=<?php echo $row_Recordset1['id_berobat']; ?>">Hapus</a></h5></td>
      <td width="78"><h5><a href="edit.php?id_berobat=<?php echo $row_Recordset1['id_berobat']; ?>">Edit</a></h5></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
						<div class="section">
							<div>
							  <div>
							    <h4>.</h4>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>

					<div>
						<h4>Links</h4>
						<ul>
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="programs.html">Programs</a>
							</li>
							<li>
								<a href="about.html">About</a>
							</li>
							<li>
								<a href="services.html">Services</a>
							</li>
							<li>
								<a href="blog.html">Blog</a>
							</li>
							<li>
								<a href="contact.html">Contact</a>
							</li>
						</ul>
					</div>
					<div class="connect">
						<h4>Keep In Touch</h4>
						<a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a>
					</div>
				</div>
		</div>
	</div>
</body>
</html>



