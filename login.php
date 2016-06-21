<?php
include 'session.php';
include 'connect.php';
include 'headers.php';
$html = $header;
$from = $_SESSION["fname"] . " " . $_SESSION["lname"];
try // Log session info
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		if ($_SESSION["id"] != '')	{
			$insert = "INSERT INTO login 
			(
			l_user, 
			l_location
			
			) VALUES (
			:user, 
			:location
			)"; 
		$prep = $dbh->prepare($insert);
		$prep->bindParam(":user",$from);
		$prep->bindParam(":location",$_SESSION["location"]);
		$prep->execute();
		header ("location:user.php");
   }
   else
		{
		header ("location:index.php?error");
		}
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}

