<?php
$servername = "localhost"; //-nama server
$username = "root"; //-nama user
$password = ""; //- password
$databasename = "tiketka"; 	//- nama database yang akan dihubungkan

$db = mysql_connect("$servername", "$username", "$password") or die ("I cannot to the database because : ".mysql_error());
      mysql_select_db("$databasename", $db) or die ("I cannot select the database '$databasename' because : ".mysql_error());
?>