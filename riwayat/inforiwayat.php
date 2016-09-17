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

mysql_select_db($database_koneksiriwayat, $koneksiriwayat);
$query_Recordset1 = "SELECT * FROM riwayat";
$Recordset1 = mysql_query($query_Recordset1, $koneksiriwayat) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<form action="" method="get">
  <table width="1027" height="98" border="1">
    <tr>
      <td width="126"><div align="center">No</div></td>
      <td width="59"><div align="center">Tanggal berobat</div></td>
      <td width="145"><div align="center">Nama</div></td>
      <td width="138"><div align="center">NIM</div></td>
      <td width="59"><div align="center">Tanggal Lahir</div></td>
      <td width="160"><div align="center">Keluhan</div></td>
      <td width="83"><div align="center">Diagnosa dan Penanganan</div></td>
      <td width="138"><div align="center">Obat</div></td>
      <td colspan="2"><div align="center">Action</div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['No']; ?></td>
        <td><?php echo $row_Recordset1['Tanggal berobat']; ?></td>
        <td><?php echo $row_Recordset1['Nama']; ?></td>
        <td><?php echo $row_Recordset1['NIM']; ?></td>
        <td><?php echo $row_Recordset1['Tanggal Lahir']; ?></td>
        <td><?php echo $row_Recordset1['Keluhan']; ?></td>
        <td><?php echo $row_Recordset1['Diagnosa dan Penanganan']; ?></td>
        <td><?php echo $row_Recordset1['Obat']; ?></td>
        <td width="30"><a href="hapus.php?No=<?php echo $row_Recordset1['No']; ?>">hapus</a></td>
        <td width="25"><a href="edit.php?No=<?php echo $row_Recordset1['No']; ?>">edit</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</form>
<?php
mysql_free_result($Recordset1);
?>
