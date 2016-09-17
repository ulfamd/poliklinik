<?php require_once('Connections/koneksipasien.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO pasien (Nama, NIM, TTL, `Jenis_Kelamin`, Jurusan, Fakultas, Alamat) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['NIM'], "text"),
                       GetSQLValueString($_POST['TTL'], "text"),
                       GetSQLValueString($_POST['Jenis_Kelamin'], "text"),
                       GetSQLValueString($_POST['Jurusan'], "text"),
                       GetSQLValueString($_POST['Fakultas'], "text"),
                       GetSQLValueString($_POST['Alamat'], "text"));

  mysql_select_db($database_koneksipasien, $koneksipasien);
  $Result1 = mysql_query($insertSQL, $koneksipasien) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>About -Poliklinik UIN Bandung</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
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
						<p>
						Poliklinik dikampus UIN Bandung melayani layanan kesehatan yang dibutuhkan civitas akademika yang memiliki dokter dan perawat serta dikepalai oleh kepala Poliklinik</p>
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
								<h3>SELAMAT DATANG DI POLIKLINIK UIN BANDUNG</h3>
								<p>&nbsp;</p>
</div>
					
						  <div>
 <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
   <p align="center">DAFTAR PASIEN BARU </p>
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">Nama:</td>
          <td><input type="text" name="Nama" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">NIM:</td>
          <td><input type="text" name="NIM" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Tanggal Lahir :</td>
          <td><input type="text" name="TTL" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Jenis Kelamin:</td>
          <td><select name="Jenis_Kelamin">
              <option value="Laki-Laki" <?php if (!(strcmp("Laki-Laki", ""))) {echo "SELECTED";} ?>>Laki-Laki</option>
              <option value="Perempuan" <?php if (!(strcmp("Perempuan", ""))) {echo "SELECTED";} ?>>Perempuan</option>
            </select>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Jurusan:</td>
          <td><input type="text" name="Jurusan" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">Fakultas:</td>
          <td><select name="Fakultas">
              <option value="Sains dan Teknologi" <?php if (!(strcmp("Sains dan Teknologi", ""))) {echo "SELECTED";} ?>>Sains dan Teknologi</option>
              <option value="Adab dan Humaniora" <?php if (!(strcmp("Adab dan Humaniora", ""))) {echo "SELECTED";} ?>>Adab dan Humaniora</option>
              <option value="Syariah dan Hukum" <?php if (!(strcmp("Syariah dan Hukum", ""))) {echo "SELECTED";} ?>>Syariah dan Hukum</option>
              <option value="Ushuluddin" <?php if (!(strcmp("Ushuluddin", ""))) {echo "SELECTED";} ?>>Ushuluddin</option>
              <option value="Ilmu Sosial dan Ilmu Politik" <?php if (!(strcmp("Ilmu Sosial dan Ilmu Politik", ""))) {echo "SELECTED";} ?>>Ilmu Sosial dan Ilmu Politik</option>
              <option value="Psikologi" <?php if (!(strcmp("Psikologi", ""))) {echo "SELECTED";} ?>>Psikologi</option>
              <option value="Tarbiyah dan Keguruan" <?php if (!(strcmp("Tarbiyah dan Keguruan", ""))) {echo "SELECTED";} ?>>Tarbiyah dan Keguruan</option>
              <option value="Dakwah dan Komunikasi" <?php if (!(strcmp("Dakwah dan Komunikasi", ""))) {echo "SELECTED";} ?>>Dakwah dan Komunikasi</option>
            </select>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right" valign="top">Alamat:</td>
          <td><textarea name="Alamat" cols="50" rows="5"></textarea>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="DAFTAR"></td>
        </tr>
      </table>
   <p>
        <input type="hidden" name="MM_insert" value="form2">
      </p>
      <p>&nbsp;</p>
</form>
    <p align="center"><a href="pasienlama.php">Pasien Lama</a></p>
    <p>&nbsp;</p>
</body>
</html>
<p>&nbsp;</p>
</body>
</html>
						    <p>&nbsp;</p>
						    <p>&nbsp;</p>
							</div>
					  </div>
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

      
