<?php
include 'session.php';
$pageTitle = "User Home Page";
$subhead ="user";
include 'connect.php';
include 'headers.php';
include 'userarray.php';
$msgdisplay = "<div class='msg'>Please select a task from the menu on the left.</div>";
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

switch ($_GET["msg"])
	{ 
		case "taskcreated":
		$msgdisplay = "<div class='msg'>Your task has been created!</div>";
		break; 
		case "msgsent":
		$msgdisplay = "<div class='msg'>Your message has been sent!</div>";
		break; 
		default:
		;
	}
?>

<?php echo $html; ?>
<?php echo $msgdisplay; ?>
</div>

</body>
</html>

