<?php
$db_host = "aadhaarusers.db.10504428.hostedresource.com";
$db_name = "aadhaarusers";
$db_username = "aadhaarusers";
$db_password = "Aadhaar#123";
mysql_connect("$db_host","$db_username","$db_password") or die ("could not connect to database");
mysql_select_db("$db_name") or die ("no database");
?>