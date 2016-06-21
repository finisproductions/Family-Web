<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=1");
$pageTitle = "Edit Message Page";
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
   // echo '<h2>Connected to database</h2>';
   
   if ($_POST["message"] != '')
   {

	$update = "UPDATE messages SET
			message = :message
			WHERE m_id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":message",$_POST["message"]);
		$prep->bindParam(":id",$_POST["m_id"]);
		$prep->execute();
		header ("location:admin.php");
		
	//echo "POST DATA DETECTED - M_ID = " .$_POST["m_id"] . "Message = " . $_POST["message"]; 	
   }
   else
   {
   $sql = "SELECT * FROM messages WHERE m_id = :id";
		$results = $dbh->prepare($sql);
		$results->bindParam(":id",$_GET["id"]);
		$results->execute();
	$html .= "<form method='POST' action='editmessage.php' enctype='multipart/form-data' >";
	$html .= "<table class='tblstyled'>";

	while($row = $results->fetch(PDO::FETCH_ASSOC)) {

		$html .= "<input type='hidden' name='m_id' value='".$_GET["id"]."' />\n";
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>To:</td>\n";
		$html .= "<td class='tblContent'>".$row['m_to']."</td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>From</td>\n";
		$html .= "<td class='fourFifths'>" .$row['m_from'] ."</td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>Message</td>\n";
		$html .= "<td class='fourFifths'><textarea name='message'>".$row['message']."</textarea></td>\n";
		$html .= "</tr>\n";
		
		
		$html .= "<tr>\n";
		$html .= "<td class='oneFifth'>&nbsp;</td>\n";
		$html .= "<td class='fourFifths'><input type='submit' name='submit' value='Update Message' class='btnLeft'></td>\n";
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
</body>
</html>