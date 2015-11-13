<?php

/*$json = $_POST["zinute"];
if (get_magic_quotes_gpc()){
        $json = stripslashes($json);
}
$data = json_decode($json);
echo $data[$i]->zinute;*/
$lat =htmlentities($_GET['lat']);
$lng =htmlentities($_GET['lng']);
$text = "Latitude:$lat \n Longtitude:$lng";
$ip = $_SERVER['REMOTE_ADDR'];
  $admin_email = "open@chimpdeck.com";
  $email = "nobody@mozilla.lt";
  $subject = "nobody@mozilla.lt";
  $comment = $text;
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
// $text yra baigtas tekstas su nusiskundimu, email ir ip.
	echo 'Sėkmingai išsiųsta.'
?>
