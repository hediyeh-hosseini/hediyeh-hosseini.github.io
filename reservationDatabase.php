<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>reservationDatabase</title>
</head>
<body>
<?php
$conn = mysqli_connect('localhost','hediyeh','hh-06712', 'aligolaf_hotel');
if ($conn)
{
	echo "<p>Connection set up successfuly.</p>";
}
mysqli_query($conn, 'DROP DATABASE IF EXISTS aligolaf_hotel');

$statementDB = "CREATE DATABASE aligolaf_hotel";

$myDBquery = mysqli_query($conn, $statementDB);

if ($myDBquery)
  {
  echo "<p>Database created successfully</p>";
  }

mysqli_select_db($conn, "aligolaf_hotel");

$statementTBL = "CREATE TABLE reservation 
(
id INT(7) NOT NULL AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
checkIn DATE NOT NULL,
checkOut DATE NOT NULL,
type ENUM ('Standard Smoking', 'Standard Non-smoking', 'Double Smoking', 'Double Non-smoking') NOT NULL,
confirm INT(9),
PRIMARY KEY (id)
)";

$myTBLquery = mysqli_query($conn, $statementTBL);

if ($myTBLquery)
{
  echo "<p>Table created successfully.</p>";
}

mysqli_close($conn);
?>
</body>
</html>
