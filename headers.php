<?php 
$header  = "<!DOCTYPE HTML>\n";
$header .= "<html>\n";
$header .= "<head>\n";
$header .= "<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>\n";
$header .= "<link href='http://fonts.googleapis.com/css?family=Oxygen+Mono' rel='stylesheet' type='text/css'>\n";
$header .= "<meta charset='utf-8' />\n";
$header .= "<title>" . $pageTitle . " - FamilyWeb</title>\n";
$header .= "<link href='styles.css' rel='stylesheet' type='text/css' />\n";
$header .= "</head>\n";
$header .= "<body>\n";
$header .= "<div class='header'><h1>Welcome to FamilyWeb</h1></div>\n";
if ($_SESSION["id"] != '') {
		$header .= "<div class='subhead'>Welcome ".$_SESSION['fname']." ".$_SESSION['lname']."</div>\n";
		if ($_SESSION["access"] == 1) $admin = true;
		if ($admin == true) $header .= "<div class='subhead'>You are an admin - <a href=admin.php>Manage</a></div>\n";
							}
else 	{
		$header .= "<div class='subhead'>Please login with your email and password below.\n";
		$header .="</div>\n";
		}
	
$header .= "<div class='clear'></div>\n";

?>