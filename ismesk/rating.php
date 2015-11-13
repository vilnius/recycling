<?php

require("phpsqlajax_dbinfo.php");
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
$ip = $_SERVER['REMOTE_ADDR'];

$page_id = mysql_real_escape_string(htmlentities($_GET['page_id']));
$rating = mysql_real_escape_string(htmlentities($_GET['rating']));
 $result = "INSERT INTO ip VALUES(null,'$ip','$page_id','$rating')";
$b = mysql_query($result);

if ($rating == "down") {
	//$a = mysql_query("SELECT down FROM markers WHERE Id = "+ $page_id);
	$sql = "UPDATE markers set down=down+1 WHERE Id = " . $page_id;
	$a = var_dump($sql);
	$a = mysql_query($sql);
}
else {
	$sql = "UPDATE markers set up=up+1 WHERE Id = " . $page_id;
	$a = mysql_query($sql);

}
//mysql_query(" UPDATE ratings SET ('$rating') WHERE id = '$page_id' ");

?>