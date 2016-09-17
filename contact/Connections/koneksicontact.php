<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksicontact = "localhost";
$database_koneksicontact = "poliklinik";
$username_koneksicontact = "root";
$password_koneksicontact = "";
$koneksicontact = mysql_pconnect($hostname_koneksicontact, $username_koneksicontact, $password_koneksicontact) or trigger_error(mysql_error(),E_USER_ERROR); 
?>