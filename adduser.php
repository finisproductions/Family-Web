<?php
include 'session.php';
if ($_SESSION["access"] != 1)
	header ("location:admin.php?msg=2");
$pageTitle = "Add New User";
$subhead ="add";
include 'connect.php';
include 'headers.php';
$html = $header;
$html = $header;
$html .= "<div class='sidebar'>\n";
$html .= "<ul>\n";
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
   
   if ($_POST["submit"] != '')
   {
   
		
	$insert = "INSERT INTO familyweb 
		(
			a_firstname, 
			a_lastname, 
			a_email, 
			a_password, 
			a_access
		) VALUES (
			:firstname, 
			:lastname, 
			:email, 
			:password, 
			:access
		)"; 
			
		$prep = $dbh->prepare($insert);
		$prep->bindParam(":firstname",$_POST["a_firstname"]);
		$prep->bindParam(":lastname",$_POST["a_lastname"]);
		$prep->bindParam(":email",$_POST["a_email"]);
		$prep->bindParam(":password",$_POST["a_password"]);
		$prep->bindParam(":access",$_POST["a_access"]);
		$prep->execute();
		header ("location:admin.php");
		
   }
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<?php echo $html; ?>

<h1>Add New User</h1>
<table class='tblstyled'>
<form method='POST' action='adduser.php' enctype='multipart/form-data'>
<tr>
<td class='tblLabel'>First Name</td>
<td class='tblContent'><input type='text' name='a_firstname' class='tblInput' /></td>
</tr>

<tr>
<td class='tblLabel'>Last Name</td>
<td class='tblContent'><input type='text' name='a_lastname' class='tblInput' /></td>
</tr>

<tr>
<td class='tblLabel'>Email</td>
<td class='tblContent'><input type='text' name='a_email'class='tblInput'  /></td>
</tr>

<tr>
<td class='tblLabel'>Password</td>
<td class='tblContent'><input type='text' name='a_password' class='tblInput' /></td>
</tr>

<tr>
<td class='tblLabel'>Access</td>
<td class='tblContent'class='tblInput' ><select name='a_access'><option value='1'>Admin</option><option value='2'>User</option></select>
</td>
</tr>

<tr>
<td class='tblLabel'>&nbsp</td>
<td class='tblContent'class='tblInput' >
<input type='submit' name='submit' value='Add User' class='btnLeft'></td>
</tr>
</form>
</table>


</body>
</html>