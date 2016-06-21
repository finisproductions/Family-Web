<?php
include 'session.php';
$pageTitle = "User Tasks";
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

try //Display Tasks
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   if ($_POST["t_id"] != '')
   {
	$update = "UPDATE tasks SET
			t_status = '1'
			WHERE t_id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":id",$_POST["t_id"]);
		$prep->execute();
		header ("location:tasks.php");
   }
   else
   {
   $sql = "SELECT * FROM tasks WHERE t_to = :to AND t_status = 0 AND t_active = 1";
		$results = $dbh->prepare($sql);
		$results->bindParam(":to",$_SESSION["id"]);
		$results->execute();
		$html .="<h2>Tasks</h2>\n";
			if ($results->rowcount() > 0) {
		$html .= "<table class='tblstyled'>\n";
		$html .= "<tr>
				<th>ID:</th>
				<th>From:</th>
				<th>Task</th>
				<th>Completed:</th></tr>\n";

	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<form method='POST' action='tasks.php' enctype='multipart/form-data' >";
		$html .= "<tr>\n";
		$html .= "<td class='t_id'>".$row['t_id']."<input type='hidden' name='t_id' value='".$row['t_id']."' /></td>\n";
		$html .= "<td class='t_from'>" .$row['t_from'] ."</td>\n";
		$html .= "<td class='t_task'>".$row['task']."</td>\n";
		$html .= "<td class='t_done'><input type='submit' name='submit' value='Done' class='btnCenter'></td>\n";
		$html .= "</tr>\n";
		$html .= "</form>\n";
		}
		

		$html .= "</table>\n";
		$html .= "</div>\n";
										}
		else 	{
				$html .="<h3>You have no Tasks to display</h3>\n";
				$html .="</div>\n";
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

