<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksipasien = "localhost";
$database_koneksipasien = "poliklinik";
$username_koneksipasien = "root";
$password_koneksipasien = "";
$koneksipasien = mysql_pconnect($hostname_koneksipasien, $username_koneksipasien, $password_koneksipasien) or trigger_error(mysql_error(),E_USER_ERROR); 
?>