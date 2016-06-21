<?php
include 'session.php';
$pageTitle = "Send Message";
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

try // New Message
{
    $db2 = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   if ($_POST["m_to"] != '')
   {
	$insert2 = "INSERT INTO messages 
		(
			m_to, 
			m_from, 
			message
			
		) VALUES (
			:to, 
			:from, 
			:message
		)"; 
			
		$prep3 = $db2->prepare($insert2);
		$prep3->bindParam(":to",$_POST["m_to"]);
		$prep3->bindParam(":from",$from);
		$prep3->bindParam(":message",$_POST["message"]);
		$prep3->execute();
		header ("location:user.php?msg=msgsent");
		
   }
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}

?>

<?php echo $html; ?>

<h1>Send new message</h1>
<table class='tblstyled'>
<form method='POST' action='send.php' enctype='multipart/form-data'>
<tr>
<td class='oneFifth'>TO:</td>
<td class='fourFifths'><select name='m_to'><option></option><?php echo $userarray; ?></select>
</td>
</tr>

<tr>
<td class='oneFifth'>Message:</td>
<td class='fourFifths'><textarea name='message' class='largeText'></textarea></td>
</tr>
<tr>
<td class='oneFifth'></td>
<td class='fourFifths'>
<input type='submit' name='submit' value='Send Message' class='btnLeft'>
</td>
</tr>
</table>
</form>
</div>


</body>
</html>

