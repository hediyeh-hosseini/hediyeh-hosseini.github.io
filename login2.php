<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>login2</title>
</head>

<body>
<p>
<?php
if (isset($_SESSION['manager']))
{
	echo "Hello, " .$_SESSION['manager']. "you are visiting a password protected page.";
	echo "Please <a href='logout.php'>logout</a> when you have completed browsing.";
}
else
{
	echo "Hello, guest. You are visiting a password protected page.";
	echo "If you are a member, please <a href='loginForm.php'>login.</a>";
}
?>
</body>
</html>