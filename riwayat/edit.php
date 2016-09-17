<?php require_once('Connections/koneksiriwayat.php'); ?>
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
  $updateSQL = sprintf("UPDATE riwayat SET `Tanggal berobat`=%s, Nama=%s, NIM=%s, `Tanggal Lahir`=%s, Keluhan=%s, `Diagnosa dan Penanganan`=%s, Obat=%s WHERE `No`=%s",
                       GetSQLValueString($_POST['Tanggal_berobat'], "text"),
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['NIM'], "text"),
                       GetSQLValueString($_POST['Tanggal_Lahir'], "text"),
                       GetSQLValueString($_POST['Keluhan'], "text"),
                       GetSQLValueString($_POST['Diagnosa_dan_Penanganan'], "text"),
                       GetSQLValueString($_POST['Obat'], "text"),
                       GetSQLValueString($_POST['No'], "int"));

  mysql_select_db($database_koneksiriwayat, $koneksiriwayat);
  $Result1 = mysql_query($updateSQL, $koneksiriwayat) or die(mysql_error());
}

mysql_select_db($database_koneksiriwayat, $koneksiriwayat);
$query_Recordset1 = "SELECT * FROM riwayat";
$Recordset1 = mysql_query($query_Recordset1, $koneksiriwayat) or die(mysql_error());
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
      <td nowrap="nowrap" align="right">Tanggal berobat:</td>
      <td><input type="text" name="Tanggal_berobat" value="<?php echo htmlentities($row_Recordset1['Tanggal berobat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
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
      <td nowrap="nowrap" align="right">Tanggal Lahir:</td>
      <td><input type="text" name="Tanggal_Lahir" value="<?php echo htmlentities($row_Recordset1['Tanggal Lahir'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Keluhan:</td>
      <td><input type="text" name="Keluhan" value="<?php echo htmlentities($row_Recordset1['Keluhan'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Diagnosa dan Penanganan:</td>
      <td><textarea name="Diagnosa_dan_Penanganan" cols="50" rows="5"><?php echo htmlentities($row_Recordset1['Diagnosa dan Penanganan'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Obat:</td>
      <td><input type="text" name="Obat" value="<?php echo htmlentities($row_Recordset1['Obat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="No" value="<?php echo $row_Recordset1['No']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
