<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksiriwayat = "localhost";
$database_koneksiriwayat = "poliklinik";
$username_koneksiriwayat = "root";
$password_koneksiriwayat = "";
$koneksiriwayat = mysql_pconnect($hostname_koneksiriwayat, $username_koneksiriwayat, $password_koneksiriwayat) or trigger_error(mysql_error(),E_USER_ERROR); 
?>