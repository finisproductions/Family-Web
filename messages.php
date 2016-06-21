<?php
include 'session.php';
$pageTitle = "User Messages";
$subhead ="user";
include 'connect.php';
include 'headers.php';
include 'userarray.php';
$html = $header;
$from = $_SESSION["fname"] . " " . $_SESSION["lname"];
$html .= "<div class='sidebar'>\n";
$html .= "<ul>\n";
$html .= "<li><a href='tasks.php'>View your tasks</a></li>\n";
$html .= "<li><a href='messages.php'>View Messages</a></li>\n";
$html .= "<li><a href='send.php'>Send a Message</a></li>\n";
$html .= "<li><a href='assign.php'>Create a Task</a></li>\n";
$html .= "<li><a href=logout.php>Logout</a></li>\n";
$html .= "</ul>\n";
$html .= "</div>\n";
$html .= "<div class='content'>\n";

try // Display Messages
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   if ($_POST["m_id"] != '')
   {
	$update = "UPDATE messages SET
			m_status = '1'
			WHERE m_id = :mid"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":mid",$_POST["m_id"]);
		$prep->execute();
		header ("location:messages.php");
   }
   else
   {
   $sql1 = "SELECT * FROM messages WHERE m_to = :to AND m_status = 0 AND m_active = 1";
		$results1 = $dbh->prepare($sql1);
		$results1->bindParam(":to",$_SESSION["id"]);
		$results1->execute();
	$html .="<h2>Messages</h2>\n";
			if ($results1->rowcount() > 0) {
	$html .= "<form method='POST' action='messages.php' enctype='multipart/form-data' >";
	$html .= "<table class='tblstyled'>";
	$html .= "<tr>
				<th>ID:</th>
				<th>From:</th>
				<th>Message</th>
				<th>Sent:</th>
				<th>Mark as Read:</th></tr>\n";

	while($row1 = $results1->fetch(PDO::FETCH_ASSOC)) {

		$html .= "<form method='POST' action='messages.php' enctype='multipart/form-data' >";
		$html .= "<tr>\n";
		$html .= "<td width='5%'>".$row1['m_id']."<input type='hidden' name='m_id' value='".$row1["m_id"]."' /></td>\n";
		$html .= "<td width='10%'>".$row1['m_from']."</td>\n";
		$html .= "<td width='50%'>".$row1['message']."</td>\n";
		$html .= "<td width='20%'>".$row1['m_time']."</td>\n";
		$html .= "<td width='15%' align='center'><input type='submit' name='submit' value='Read' class='btnCenter'></td>\n";
		$html .= "</tr>\n";
		$html .= "</form>\n";
		}

		$html .= "</table>\n";
		$html .="</div>\n";
										}
		else {
				$html .="<h3>You have no messages to display</h3>\n";
				$html .="</div>\n";
				$html .= "<div class='clear'></div>\n";
			}
}
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<?php echo $html; ?>
<div class='clear'></div>
<div class="footer clear">Copyright 2014 Cris Romero</div>
</body>
</html>

