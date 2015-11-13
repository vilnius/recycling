<?php

/*$json = $_POST["zinute"];
if (get_magic_quotes_gpc()){
        $json = stripslashes($json);
}
$data = json_decode($json);
echo $data[$i]->zinute;*/
$complainttext =htmlentities($_GET['zinute']);
$emailtext =htmlentities($_GET['email']);
$id =htmlentities($_GET['id']);

$ip = $_SERVER['REMOTE_ADDR'];
// $text yra baigtas tekstas su nusiskundimu, email ir ip.
$text = "Nusikundimas:$complainttext \n email:$emailtext \n ip:$ip \n konteinerio id: $id";

$admin_email = "open@chimpdeck.com";
  $email = "nobody@mozilla.lt";
  $subject = "nobody@mozilla.lt";
  $comment = $text;
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
var_dump($text);
?>
