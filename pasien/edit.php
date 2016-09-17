<?php require_once('Connections/koneksipasien.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE pasien SET Nama=%s, NIM=%s, TTL=%s, `Jenis_Kelamin`=%s, Jurusan=%s, Fakultas=%s, Alamat=%s WHERE id_berobat=%s",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['NIM'], "text"),
                       GetSQLValueString($_POST['TTL'], "text"),
                       GetSQLValueString($_POST['Jenis_Kelamin'], "text"),
                       GetSQLValueString($_POST['Jurusan'], "text"),
                       GetSQLValueString($_POST['Fakultas'], "text"),
                       GetSQLValueString($_POST['Alamat'], "text"),
                       GetSQLValueString($_POST['id_berobat'], "int"));

  mysql_select_db($database_koneksipasien, $koneksipasien);
  $Result1 = mysql_query($updateSQL, $koneksipasien) or die(mysql_error());

  $updateGoTo = "Infopasienbaru.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_koneksipasien, $koneksipasien);
$query_Recordset1 = "SELECT * FROM pasien";
$Recordset1 = mysql_query($query_Recordset1, $koneksipasien) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_berobat:</td>
      <td><?php echo $row_Recordset1['id_berobat']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="Nama" value="<?php echo htmlentities($row_Recordset1['Nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NIM:</td>
      <td><input type="text" name="NIM" value="<?php echo htmlentities($row_Recordset1['NIM'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TTL:</td>
      <td><input type="text" name="TTL" value="<?php echo htmlentities($row_Recordset1['TTL'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jenis Kelamin:</td>
      <td><input type="text" name="Jenis_Kelamin" value="<?php echo htmlentities($row_Recordset1['Jenis Kelamin'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Jurusan:</td>
      <td><input type="text" name="Jurusan" value="<?php echo htmlentities($row_Recordset1['Jurusan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fakultas:</td>
      <td><input type="text" name="Fakultas" value="<?php echo htmlentities($row_Recordset1['Fakultas'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Alamat:</td>
      <td><input type="text" name="Alamat" value="<?php echo htmlentities($row_Recordset1['Alamat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_berobat" value="<?php echo $row_Recordset1['id_berobat']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
