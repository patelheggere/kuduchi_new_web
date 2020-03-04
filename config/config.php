<?php
/*	
$hostname='localhost';
	$user = 'root';
	$password = ' ';
	$mysql_database = 'kudachi';
	$db = mysql_connect($hostname, $user, $password,$mysql_database);
	mysql_select_db("user", $db);
 * 
 * 
        */

$servername = "localhost";
$uname = "root";
$pwd = "root";
$dbname = "kudachi_new";

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'kudachi_new');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(!$db)
   {
       die(mysqli_errno($db));
   }
   
?>