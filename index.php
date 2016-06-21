<?php
session_start();
$pageTitle = "Login";
$subhead ="login";
include 'headers.php';
include 'connect.php';
$html = $header;
try 
{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $sql = "SELECT * FROM familyweb WHERE a_email = :email AND a_password = :password";
		$results = $dbh->prepare($sql);
		$results->bindParam(':email', $_POST["email"]);
		$results->bindParam(':password', $_POST["password"]);
		$results->execute();
		
		if ($results->rowcount() > 0)
		{
			$row = $results->fetch(PDO::FETCH_ASSOC);
			$_SESSION["access"] = $row["a_access"];
			$_SESSION["fname"] = $row["a_firstname"];
			$_SESSION["lname"] = $row["a_lastname"];
			$_SESSION["id"] = $row["id"];
			$_SESSION["location"] = $_SERVER['REMOTE_ADDR'];
			header("location:login.php");
		}
		else 
		{
			if ($results->rowcount() == 0 AND $_POST["m_id"] != '') {
			header("location:index.php?msg=invalid"); }
		}

		
		
}
	catch(PDOException $e)
{
    echo $e->getMessage();
}

$html .= "<form method='POST' action='index.php'>\n";
$html .= "<div class='login'>\n";
$html .= "<label for='email'>Email:</label>\n";
$html .= "<input type='text' name='email' />\n";
$html .= "</div>\n";
$html .= "<div class='login'>\n";
$html .= "<label for='password'>Password:</label>\n";
$html .= "<input type='password' name='password' />\n";
$html .= "</div>\n";
$html .= "<div class='login'>\n";
$html .= "<p><input type='submit' name='submit' value='Login'></p>\n";
$html .= "</form>\n";
$html .= "</div>\n";
//$html .= "<p><a href='password.php'>Forgot your password?</a></p>\n";
switch ($_GET["msg"])
	{ 
		case "invalid":
		$msgdisplay = "<div class='msg'>Your email and/or password are incorrect.</div>";
		break; 
		case "error":
		$msgdisplay = "<div class='msg'>Sorry, there was a server error. Please contact the admin.</div>";
		break; 
		default:
		;
	}
?>
<?php echo $html; ?>
<?php echo $msgdisplay; ?>
<div class='clear'></div>

</body>
</html>