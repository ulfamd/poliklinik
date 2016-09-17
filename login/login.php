<?php require_once('Connections/koneksipoliklinik.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO login (Bagian, Username, Password) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Bagian'], "text"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Password'], "text"));

  mysql_select_db($database_koneksipoliklinik, $koneksipoliklinik);
  $Result1 = mysql_query($insertSQL, $koneksipoliklinik) or die(mysql_error());

  $insertGoTo = "sukses.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html>
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
						<div>
						  <div>
							<h3>SELAMAT DATANG DI POLIKLINIK UIN BANDUNG</h3>
							  <p>Terima Kasih telah berobat dan mengunjungi Poliklinik,</p>
								<p>&nbsp; </p>
							</div>
						</div>
					  <div></div>
						<div>
						  <div>
                          <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Bagian:</td>
      <td><select name="Bagian">
        <option value="Asisten dokter" <?php if (!(strcmp("Asisten dokter", ""))) {echo "SELECTED";} ?>>Asisten dokter</option>
        <option value="Admin" <?php if (!(strcmp("Admin", ""))) {echo "SELECTED";} ?>>Admin</option>
      </select>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Username:</td>
      <td><input type="text" name="Username" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password:</td>
      <td><input type="password" name="Password" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Login"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
</body>
</html>
						    <p>&nbsp;</p>
						    <p>&nbsp;</p>
	</div>
</body>
</html>