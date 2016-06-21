<?php
include 'session.php';
$pageTitle = "Create New Task";
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


try //New Tasks
{
    $db3 = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   // echo '<h2>Connected to database</h2>';
   
   if ($_POST["t_to"] != '')
   {
   
		
	$insert3 = "INSERT INTO tasks 
		(
			t_to, 
			t_from, 
			task
			
		) VALUES (
			:to, 
			:from, 
			:task
		)"; 
			
		$prep4 = $dbh->prepare($insert3);
		$prep4->bindParam(":to",$_POST["t_to"]);
		$prep4->bindParam(":from",$from);
		$prep4->bindParam(":task",$_POST["task"]);
		$prep4->execute();
		header ("location:user.php?msg=taskcreated");
		
   }
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}

?>

<?php echo $html; ?>
<h1>Create New Task</h1>
<table class='tblstyled'>
<form method='POST' action='assign.php' enctype='multipart/form-data'>
<tr>
<td class='oneFifth'>To:</td>
<td class='fourFifths'><select name='t_to'>
<option></option>
<?php echo $userarray; ?>
</select></td>
</tr>

<tr>
<td class='oneFifth'><label for='task'>Task: </td>
<td class='fourFifths'><input type='text' name='task'class='largeText'/></td>
</tr>

<tr>
<td class='oneFifth'></td>
<td class='fourFifths'>
<input type='submit' name='submit' value='Create Task' class='btnLeft'></td>
</tr>
</form>
</table>
</div>
<div id="footer">Copyright 2014 Cris Romero</div>
</body>
</html>

