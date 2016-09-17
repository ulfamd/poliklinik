<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksipoliklinik = "localhost";
$database_koneksipoliklinik = "poliklinik";
$username_koneksipoliklinik = "root";
$password_koneksipoliklinik = "";
$koneksipoliklinik = mysql_pconnect($hostname_koneksipoliklinik, $username_koneksipoliklinik, $password_koneksipoliklinik) or trigger_error(mysql_error(),E_USER_ERROR); 
?>