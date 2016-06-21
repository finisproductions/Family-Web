<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=1");
include 'connect.php';

try
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   // echo '<h2>Connected to database</h2>';
   
	$update = "UPDATE tasks SET
			t_active = '0'
			WHERE t_id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":id",$_GET["id"]);
		$prep->execute();
		header ("location:managetasks.php");
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}