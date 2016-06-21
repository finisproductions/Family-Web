<?php
include 'session.php';
if ($_SESSION['access'] != 1) header("location:user.php");
$pageTitle = "Admin - Manage Messages";
$subhead ="admin";
include 'connect.php';
include 'headers.php';
$html = $header;
$msgdisplay = "<div class='msg'>Please select a task from the menu on the left.</div>";
$html .= "<div class='sidebar'>\n";
$html .= "<ul>\n";
$html .= "<li><a href=user.php>Home</a></li>\n";
$html .= "<li><a href=adduser.php>Add User</a></li>\n";
$html .= "<li><a href='manageusers.php'>Manage Users</a></li>\n";
$html .= "<li><a href='managemessages.php'>Manage Messages</a></li>\n";
$html .= "<li><a href='managetasks.php'>Manage Tasks</a></li>\n";
$html .= "<li><a href=logout.php>Logout</a></li>\n";
$html .= "</ul>\n";
$html .= "</div>\n";
$html .= "<div class='content'>\n";
try 
{

   $dbh2 = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$sql2 = "SELECT m_id, m_to, m_from, message, m_time, m_status
				FROM messages
				WHERE (m_active = 1)
				ORDER BY m_id";
				
		$results2 = $dbh2->query($sql2);
		$html .= "<h1>Messages:</h1>\n";
		$html .= "<table border='1'>\n";
		$html .= "<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>To: </th>
				<th>From: </th>
				<th>Message: </th>
				<th>Status: </th>
				<th>Sent: </th>
				</tr>\n";
	while($row2 = $results2->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<tr>\n";
		$html .= "<td><a href='editmessage.php?id=".$row2['m_id']."'>Edit</a></td>\n";
		$html .= "<td><a href='deletemessage.php?id=".$row2['m_id']."'>Delete</a></td>\n";
		$html .= "<td>".$row2['m_to']."</td>\n";
		$html .= "<td>".$row2['m_from']."</td>\n";
		$html .= "<td>".$row2['message']."</td>\n";
		$html .= "<td>";
		if ($row2['m_status'] == 0) { 
			$html .= "Unread";
		} 
			else $html .= "Read";
		$html .= "</td>\n";
		$html .= "<td>".$row2['m_time']."</td>\n";
		$html .= "</tr>\n";
		}
	$html .= "</table>\n";
}
	catch(PDOException $e)
{
    echo $e->getMessage();
	echo "Catch Event";
}

?>

<?php echo $html; ?>
<div class="footer clear">Copyright 2014 Cris Romero</div>
</body>
</html>