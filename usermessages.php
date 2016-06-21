<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=1");
$pageTitle = "User Page";
$subhead ="welcome";
include 'connect.php';
include 'headers.php';
$html = $header;

try 
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   if ($_POST["m_id"] != '')
   {
	$update = "UPDATE messages SET
			m_status = '1'
			WHERE m_id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":id",$_POST["m_id"]);
		$prep->execute();
		header ("location:usermessages.php");
   }
   else
   {
   $sql = "SELECT * FROM messages WHERE m_to = :to AND m_status = 0";
		$results = $dbh->prepare($sql);
		$results->bindParam(":to",$_SESSION["id"]);
		$results->execute();
	$html .= "<form method='POST' action='user.php' enctype='multipart/form-data' >";
	$html .= "<table border='1'>";
	$html .= "<tr>
				<th class='hidden' style='width:0px'>ID:</th>
				<th>From:</th>
				<th>Message</th>
				<th>Sent:</th>
				<th></th></tr>\n";

	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<tr>\n";
		$html .= "<td class='hidden' style='width:0px' input type='text' name='t_id' value='".$row['t_id']."' /></t>\n";
		$html .= "<td align='left'>" .$row['m_from'] ."</td>\n";
		$html .= "<td align='left'>".$row['message']."</td>\n";
		$sqldate = $row['m_time'];
		$html .= "<td align='left'>".$row['m_time']."</td>\n";
		$html .= "<td align='left' class='tall'><input type='submit' name='submit' value='Mark as Read'></td>\n";
		$html .= "</tr>\n";
		}
		$html .= "</form>\n";
		$html .= "</table>\n";
}
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<?php echo $html; ?>
<div class="footer clear">Copyright 2014 Cris Romero</div>
</body>
</html>