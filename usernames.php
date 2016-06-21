<?php
include 'connect.php';

try 
{
   // $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   // echo '<h2>Connected to database</h2>';
   
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$sql = "SELECT id, a_firstname, a_lastname
				FROM familyweb";
		$results = $dbh->query($sql);
		$results->execute();
		
	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		echo $results['1'];
	}
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}
?>