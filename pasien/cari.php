<?php

	include "Connections/koneksipasien.php";
?>

<?php
	$NIM = $_POST['NIM'];
	
	if(empty($NIM)){
		echo "Anda belum Login/>
		<a href=javascript.history.go(-1)><b>Ulangi!</b>";
	}
	else{
		mysql_query("select * from pasien where NIM = '$NIM'") or die(mysql_error());
	}
	
	
	
	
	
	
	
?>
<html>
<body>
    
  <table width="1099" border="1">
  <thead>
  <tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>TTL</th>
    <th>Jenis Kelamin</th>
    <th>Jurusan</th>
    <th>Fakultas</th>
    <th>Alamat</th>
    </tr>
  </thead>
  <tbody>
  		<tr>
        	
            <?php
				$NIM = $_POST['NIM'];
				$sql = mysql_query("SELECT * FROM pasien WHERE NIM = '$NIM'");
				while($r = mysql_fetch_array($sql)){
					echo "<tr>";	
			?>
                
                    <td><center><?php echo "$r[Nama]"?></center></td>
                    <td><center><?php echo "$r[NIM]"?></center></td>
                    <td><center><?php echo "$r[TTL]"?></center></td>
                    <td><center><?php echo "$r[Jenis_Kelamin]"?></center></td>
                    <td><center><?php echo "$r[Jurusan]"?></center></td>
                    <td><center><?php echo "$r[Fakultas]"?></center></td>
                    <td><center><?php echo "$r[Alamat]"?></center></td>
                <?php
					echo "</tr>";
					}
			?>
        </tr>
  </tbody>
</table>
</body>
</html>