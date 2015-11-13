<?php
require("phpsqlajax_dbinfo.php");
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 
// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
header("Content-type: text/json");
// Start XML file, echo parent node
// Iterate through the rows, printing XML nodes for each
$data = [];
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $stdClass = new StdClass();
   $stdClass->id = $row['id'];
   $stdClass->address = 'hasgdjhsagdjgasd';//$row['address'];
   $stdClass->lat = $row['lat'];
   $stdClass->lng = $row['lng'];
   $stdClass->type = $row['type'];
   $stdClass->up = $row['up'];
   $stdClass->down = $row['down'];
   
   //var_dump($stdClass);
   //var_dump(json_encode($stdClass);
   
   $data[] = $stdClass;
}

echo ( json_encode($data));
?>