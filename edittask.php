<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=1");
$pageTitle = "Edit Task Page";
$subhead ="edituser";
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
   if ($_POST["task"] != '')
   {
	$update = "UPDATE tasks SET
			task = :task
			WHERE t_id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":task",$_POST["task"]);
		$prep->bindParam(":id",$_POST["t_id"]);
		$prep->execute();
		header ("location:admin.php");
   }
   else
   {
   $sql = "SELECT * FROM tasks WHERE t_id = :id";
		$results = $dbh->prepare($sql);
		$results->bindParam(":id",$_GET["id"]);
		$results->execute();
	$html .= "<form method='POST' action='edittask.php' enctype='multipart/form-data' >";
	$html .= "<table class='tblstyled'>";

	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<input type='hidden' name='t_id' value='".$_GET["id"]."' />\n";
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>To:</td>\n";
		$html .= "<td align='left'>'".$row['t_to']."</td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>From</td>\n";
		$html .= "<td align='left'>" .$row['t_from'] ."</td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>Task</td>\n";
		$html .= "<td align='left'><textarea name='task'>".$row['task']."</textarea></td>\n";
		$html .= "</tr>\n";

		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>&nbsp;</td>\n";
		$html .= "<td class='fourFifths'><input type='submit' name='submit' value='Update Task' class='btnLeft'></td>\n";
		$html .= "</tr>\n";

		$html .= "</form>\n";
		$html .= "</table>\n";
		}
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