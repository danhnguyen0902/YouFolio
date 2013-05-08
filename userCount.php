<?php
// file: ex1.php
require 'edg/class.eyemysqladap.inc.php';
require 'edg/class.eyedatagrid.inc.php';
 
// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'youfolio_frat', 'password123', 'youfolio_fratcontest');
 
$dg = new EyeDataGrid($db); // Load the datagrid class
// Fetch all rows and columns from the `people` table
$dg->setQuery("*", "users");
 
// Print the table
$dg->printTable();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}

$sql = "SELECT count(*) FROM users";
	$result = $con->query($sql);
	$numRegistered = $result->fetch_array(MYSQLI_NUM);
	
	echo 'Total: ' . $numRegistered[0];
	
	
	
	
?>