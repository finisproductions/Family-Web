<?php
include 'session.php';
if ($_SESSION['access'] != 1) header("location:user.php");
$pageTitle = "Admin Page";
$subhead ="admin";
include 'connect.php';
include 'headers.php';
$msgdisplay = "<div class='msg'>Please select a task from the menu on the left.</div>";
$html = $header;
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

?>

<?php echo $html; ?>
<?php echo $msgdisplay; ?>
</div>
<div class="footer clear">Copyright 2014 Cris Romero</div>
</body>
</html>