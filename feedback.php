<!DOCTYPE html>
<html>

	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="case.css">

		<title>Cougar Inn Home page</title>
	</head>
	
	<body>
	
		<header>
			<h1>Cougar Inn</h1>
			<h3>Feel Home!</h3>
			</header>
			<div>
			<nav>
				<ul>
					<li><a href="about.html">About Us</a></li>
					<li><a href="college.html">Columbia College</a></li>
					<li><a href="around.html">Around Columbia</a></li>
					<li><a href="reservation.html">Reservation</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="directions.html">Directions</a></li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>
			</nav>
		</div>
		
		<main>
			<section id = "aboutMe">
			<img alt = "feedback" src="feedback.jpg" height="100">
			<p title = "Inn's welcome note">Welcome to Cougar Inn</p>
			
			<p>We believe that customers are always right. We welcome any kind of feedback.Please let us know what you think!</p>
			<p>Thanks.</p>
			
			<form action = "" method = "post">
			<h1>Your Feedback</h1>
			<p> Enter your name:
			<br />
			<input type = "text" name = "name" size = "20" maxlength = "20" />
			<br />
			Your comments:
			<br />
			<textarea name = "comments" rows = "6" cols = "40">
			</textarea>
			</p>
			<p>
			<input type = "submit" name = "submit" value = "Submit" />
			<input type = "submit" name = "view" value = "view other Feedbacks" />
			</p>
	<?php
	if ($_POST['submit'])
{
	$myFileIn = fopen("feedback.txt", "a");
	if ($myFileIn)
		{
			fputs($myFileIn, $_POST['name']."\n");
			fputs($myFileIn, $_POST['comments']."\n");
			echo "<p>Thanks for your feedback.</p>";
			fclose($myFileIn);
		}
	else
		echo "<p>Try again.</p>";
}
elseif ($_POST['view'])
{
	$myFileOut = fopen("feedback.txt", "r");
	while (!feof($myFileOut))
	{
		echo "<p>";
		echo fgets($myFileOut);
		echo "</p>";
	}
	fclose($myFileOut);
}
?>
			</form>
			</section>
			
			
		</main>

		<footer>
			<p>&copy; Hediyeh Hosseini LLC 2016	</p>
		</footer>
		
	</body>
	
</html>	