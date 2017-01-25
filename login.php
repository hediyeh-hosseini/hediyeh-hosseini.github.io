<?php
if (isset($_POST['submit']))
{
session_start();
$name = $_POST['userName'];
$pw = $_POST['password'];
$fn = "manager.txt";
}
if (file_exists($fn) && is_readable($fn))
{
$arrManager = file($fn);
for  ($i = 0; $i < count($arrManager); $i+=2)
{
if (trim($arrManager[$i]) ==$name && trim($arrManager[$i+1]) == $pw)
{
$_SESSION['manager'] = $name;
header("Location: login.php");
}
}
}
if (!isset($_SESSION['manager']))
{
$_SESSION['errorMessage'] = "Invalid username or password!";
header("Location: loginForm.php");
}
?>