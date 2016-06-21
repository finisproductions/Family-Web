<?php
include 'connect.php';
//Define Array of users
$users = (array) null;
$userarray = "";
$optionnum = 1;
$usernum = 0;
try 
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$sql = "SELECT  a_firstname, a_lastname
				FROM familyweb";
				
		$results = $dbh->query($sql);
	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
	array_push($users, $row['a_firstname']." ".$row['a_lastname']);
	$userarray .= "<option value='".$optionnum."'>".$users[$usernum]."</option>";
	$optionnum ++;
	$usernum ++;
		}
}
	catch(PDOException $e)
{
    echo $e->getMessage();}