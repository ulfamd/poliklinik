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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO riwayat (`Tanggal berobat`, Nama, NIM, `Tanggal Lahir`, Keluhan, `Diagnosa dan Penanganan`, Obat) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Tanggal_berobat'], "text"),
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['NIM'], "text"),
                       GetSQLValueString($_POST['Tanggal_Lahir'], "text"),
                       GetSQLValueString($_POST['Keluhan'], "text"),
                       GetSQLValueString($_POST['Diagnosa_dan_Penanganan'], "text"),
                       GetSQLValueString($_POST['Obat'], "text"));

  mysql_select_db($database_koneksiriwayat, $koneksiriwayat);
  $Result1 = mysql_query($insertSQL, $koneksiriwayat) or die(mysql_error());

  $insertGoTo = "inforiwayat.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p align="center">Input Riwayat Pasien</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Tanggal berobat:</td>
      <td><input type="text" name="Tanggal_berobat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama:</td>
      <td><input type="text" name="Nama" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NIM:</td>
      <td><input type="text" name="NIM" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tanggal Lahir:</td>
      <td><input type="text" name="Tanggal_Lahir" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" valign="top">Keluhan:</td>
      <td><textarea name="Keluhan" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" valign="top">Diagnosa dan Penanganan:</td>
      <td><textarea name="Diagnosa_dan_Penanganan" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Obat:</td>
      <td><input type="text" name="Obat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Input"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
