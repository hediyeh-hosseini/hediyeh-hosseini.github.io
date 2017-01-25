<!DOCTYPE html>
<html>
<head>
<title>login form</title>
</head>

<body>
<?php
session_start();
if (isset($_SESSION['errorMessage']))
{
   echo "<p>".$_SESSION['errorMessage']."</p>";
}
?>
<form action = "reservationData.php" method = "post">
<p>
User name:
<input type = "text" name = "userName" />
<br>
password:
<input type = "password" name = "password" />
</p>
<p>
<input type = "submit" name = "submit" value = "submit" />
</p>
</form>
</body>

</html>