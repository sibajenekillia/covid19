<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_HSRMZAMBIA = "localhost";
$database_HSRMZAMBIA = "hsrm_zambia";
$username_HSRMZAMBIA = "root";
$password_HSRMZAMBIA = "";
$HSRMZAMBIA = mysql_pconnect($hostname_HSRMZAMBIA, $username_HSRMZAMBIA, $password_HSRMZAMBIA) or trigger_error(mysql_error(),E_USER_ERROR); 
?>