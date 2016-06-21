<?php
include 'session.php';
if ($_SESSION['access'] != 1) header("location:user.php");
$pageTitle = "Admin - Manage Users";
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

    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$sql = "SELECT a_email, a_firstname, a_lastname, id
				FROM familyweb
				WHERE (a_active = 1)
				ORDER BY a_lastname";
		$results = $dbh->query($sql);
		$html .= "<h1>Users</h1>\n";
		$html .= "<table border='1'>\n";
		$html .= "<tr>
				<th>Edit</th>
				<th>Delete</th>
				<th>First</th>
				<th>Last</th>
				<th>Email</th>
				</tr>\n";
	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<tr>\n";
		$html .= "<td><a href='edituser.php?id=".$row['id']."'>Edit</a></td>\n";
		$html .= "<td><a href='deleteuser.php?id=".$row['id']."'>Delete User</a></td>\n";
		$html .= "<td>".$row['a_firstname']."</td>\n";
		$html .= "<td>".$row['a_lastname']."</td>\n";
		$html .= "<td>".$row['a_email']."</td>\n";
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