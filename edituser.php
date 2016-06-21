<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=1");
$pageTitle = "Edit User Page";
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
   
   if ($_POST["id"] != '')
   {

	$update = "UPDATE familyweb SET
			a_firstname = :firstname, 
			a_lastname = :lastname, 
			a_email = :email, 
			a_password = :password, 
			a_access = :access, 
			WHERE id = :id"; 
		$prep = $dbh->prepare($update);
		$prep->bindParam(":firstname",$_POST["a_firstname"]);
		$prep->bindParam(":lastname",$_POST["a_lastname"]);
		$prep->bindParam(":email",$_POST["a_email"]);
		$prep->bindParam(":password",$_POST["a_password"]);
		$prep->bindParam(":access",$_POST["a_access"]);
		$prep->bindParam(":id",$_POST["id"]);
		$prep->execute();
		header ("location:admin.php");
		
   }
   else
   {
   $sql = "SELECT * FROM familyweb WHERE id = :id";
		$results = $dbh->prepare($sql);
		$results->bindParam(':id', $_GET["id"]);
		$results->execute();
	$html .= "<form method='POST' action='edituser.php' enctype='multipart/form-data' >";
	$html .= "<table class='tableCenter' border='1'>";

	while($row = $results->fetch(PDO::FETCH_ASSOC)) {
		$html .= "<tr>\n";
		$html .= "<th>ID</th>\n";
		$html .= "<td align='left'>".$row['id']."</td>\n";
		$html .= "<input type='hidden' name='id' value='".$row['id']."' />\n";
		$html .= "</tr>\n";
	
		$html .= "<tr>\n";
		$html .= "<th>First Name</th>\n";
		$html .= "<td align='left'><input type='text' name='a_firstname' value='".$row['a_firstname']."' /></td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>Last Name</th>\n";
		$html .= "<td align='left'><input type='text' name='a_lastname' value='".$row['a_lastname']."' /></td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>Email</th>\n";
		$html .= "<td align='left'><input type='text' name='a_email' value='".$row['a_email']."' /></td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>Password</th>\n";
		$html .= "<td align='left'><input type='text' name='a_password' value='".$row['a_password']."' /></td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>Access</th>\n";
		$html .= "<td align='left'>\n";
		$html .="<select name='a_access'>\n";
		
		if($row['a_access'] != 1)
			$html .="<option value='1'>Admin</option>\n";
		else 
			$html .="<option value='1' selected>Admin</option>\n";
		
		if($row['a_access'] != 2)
		$html .="<option value='2'>User</option>\n";
		else
			$html .="<option value='2' selected>User</option>\n";
			
		$html .="</select>\n";
		
		$html .= "</td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>&nbsp;</th>\n";
		$html .= "<td align='left' class='tall'><input type='submit' name='submit' value='Update User'></td>\n";
		$html .= "</tr>\n";
		
		$html .= "<tr>\n";
		$html .= "<th>&nbsp;</th>\n";
		$html .= "<td align='left' class='tall'><a href='admin.php'><img src='image/backBtn.png' /></a>\n";
		$html .= "</tr>\n";
		
		$html .= "</table>\n";
		$html .= "</form>\n";
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