<?php
$host="10.0.6.145\SQLEXPRESS";
//$host="DIT\MSSQLSERVER08";
$username="sa";
$password="123";
$db_nameLab="LABORAT";

function db_connectLab(){
global $host, $username, $password, $db_nameLab;
set_time_limit(600);
mssql_connect($host,$username,$password) or die ("Database cannot connected. Please visit us later");
mssql_select_db($db_nameLab) or die ("Under maintenance");
}