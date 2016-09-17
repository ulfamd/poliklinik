<?php require_once('Connections/koneksicontact.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contact (Nama, Email, Messages) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Messages'], "text"));

  mysql_select_db($database_koneksicontact, $koneksicontact);
  $Result1 = mysql_query($insertSQL, $koneksicontact) or die(mysql_error());
}
?><!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - POLIKLINIK UIN BANDUNG</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="background">
		<div class="page">
			<a href="index.html" id="logo">POLIKLINIK UIN BANDUNG</a>
			<div class="sidebar">
				<ul>
					<li>
						<a href="../index.html">Home</a>
					</li>
					<li>
						<a href="../about.html">About</a>
					</li>
					<li class="selected">
						<a href="../contact.html">Contact</a>
					</li>
				</ul>
				<div class="first">
				  <div class="first">
				    <div>
				      <h3>Sekilas Poliklinik UIN BDG</h3>
				      <img src="images/uinedit.jpg" alt="" width="180" height="183">
				      <p> Poliklinik dikampus UIN Bandung melayani layanan kesehatan yang dibutuhkan civitas akademika yang memiliki dokter dan perawat serta dikepalai oleh kepala Poliklinik</p>
			        </div>
			      </div>
				</div>
				<div>
				  <div>
				    <div>
				      <h3> Poliklinik</h3>
				      <p>&nbsp;</p>
				      <img src="images/Klinikedit.jpg" alt=""width="180"height="183">
				      <p>Lokasi Poliklinik UIN Bandung dengan mengutamakan pelayanan dan kenyamanan pasien saat berobat</p>
			        </div>
			      </div>
				</div>
			</div>
			<div class="body">
				<div class="contact">
					<div>
						<div>
							<div>
								<h4>POLIKLINIK UIN BANDUNG</h4>
								<p>Informasi dan Akses untuk menghubungi Karyawan dan Kepala Poliklinik UIN Bandung serta Fasilitasnya</p>
							  <table>
									<tr>
										<td>Lokasi
										  <p>
												Gedung Student Center Lantai 1</p></td>
										<td>CONTACT 
										  <p>08966534990<br>
									  </p></td>
										<td><p>&nbsp;</p></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><p>&nbsp;</p></td>
										<td><p>&nbsp;</p></td>
									</tr>
								</table>
							</div>
							<div>									<h4>Send a message</h4>
									<form action="index.html"><?php require_once('Connections/koneksicontact.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="Nama" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="Email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Messages:</td>
      <td><textarea name="Messages" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="SEND" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>

									</form>
						  </div>
								<div>
								  <div>
								    <h4>Layanan									</h4>
								    <ul>
										<li>
												<p>Berobat</p>
									  </li>
											<li>
												<p>
													Periksa Gula Darah*</p>
											</li>
											<li>
												<p>
													Periksa Tensi</p>
											</li>
											<li>
												<p>Tes Kesehatan Kegiatan ospek											</p>
											</li>
											<li>
												<p>Mengukur Berat Badan</p>
											</li>
											<li>
												<p>Mengukur Tinggi Badan</p>
											</li>
											<li>
												<p>Konsultasi Kesehatan</p>
											</li>
									</ul>
								  </div>
						  </div>
					  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
					<div>
						<h4>Blog</h4>
						<p>
							This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text.
						</p>
						<a href="blog.html">Go To Blog</a>
					</div>
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
	</div>
</body>
</html>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="Nama" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="Email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Messages:</td>
      <td><textarea name="Messages" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="SEND" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
