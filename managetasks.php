<?php
include 'session.php';
if ($_SESSION['access'] != 1) header("location:user.php");
$pageTitle = "Admin - Manage Tasks";
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

	$dbh3 = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$sql3 = "SELECT t_id, t_to, t_from, t_time, task, t_status
				FROM tasks
				WHERE (t_active = 1)
				ORDER BY t_id";
				
		$results3 = $dbh3->query($sql3);
	
		$html .= "<h1>Tasks:</h1>\n";
		$html .= "<table border='1'>\n";
		$html .= "<tr>
				<th>Edit</th>
				<th>View</th>
				<th>To: </th>
				<th>From: </th>
				<th>Task: </th>
				<th>Status: </th>
				<th>Date Assigned: </th>
				</tr>\n";
	while($row3 = $results3->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<tr>\n";
		$html .= "<td><a href='edittask.php?id=".$row3['t_id']."'>Edit</a></td>\n";
		$html .= "<td><a href='deletetask.php?id=".$row3['t_id']."'>Delete</a></td>\n";
		$html .= "<td>".$row3['t_to']."</td>\n";
		$html .= "<td>".$row3['t_from']."</td>\n";
		$html .= "<td>".$row3['task']."</td>\n";
		$html .= "<td>";
		if ($row2['t_status'] == 0) { 
			$html .= "Incomplete";
		} 
			else $html .= "Completed";
		$html .= "<td>".$row3['t_time']."</td>\n";
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