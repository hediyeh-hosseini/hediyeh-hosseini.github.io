<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
</head>

<body>
<p>
<?php
if (!isset($_SESSION['manager']))
{
	header("Location: loginForm.php");
}
else
{
	$_SESSION = array();
	session_destroy();
	echo "You have logged out.";
	echo "Please <a href='loginForm.php'>login</a>.";
}
?>
</p>
</body>
</html>