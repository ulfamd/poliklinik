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

mysql_select_db($database_koneksicontact, $koneksicontact);
$query_Recordset1 = "SELECT * FROM contact";
$Recordset1 = mysql_query($query_Recordset1, $koneksicontact) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<form action="" method="get">
  <table border="1">
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Email</td>
      <td>Messages</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['No']; ?></td>
        <td><?php echo $row_Recordset1['Nama']; ?></td>
        <td><?php echo $row_Recordset1['Email']; ?></td>
        <td><?php echo $row_Recordset1['Messages']; ?></td>
      </tr>
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</form>
<?php
mysql_free_result($Recordset1);
?>
