
<?php
    // set up connection with the hotel database
    $conn = mysqli_connect('localhost', 'hediyeh', 'hh-06712', 'aligolaf_hotel');
    if (!$conn) // if connection failed
    {
	die ("Unable to connect to database: ".mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>confirmation</title>
</head>
<body>

<?php
    if (isset($_POST['submit'])) // if the submit button is clicked.
    {
    // define five variables to accept four values from the Web form.
    // and generate a random confirmation number.
    $name = $_POST['name'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $room = $_POST['room'];
    $confirm = rand(0, 10000);
	// write the reservation data to the table
	$statement = "INSERT INTO reservation (name, checkIn, checkOut, type, confirm)
		VALUES ('$name', '$checkIn', '$checkOut', '$room', '$confirm')";

	// if the record is successfully added
	if (mysqli_query($conn, $statement))
	{
	    echo "Thank you for your reservation.";
	    echo "Your confirmation number is ".$confirm;
	    echo "<br /><a href = 'reservation.html'>Reserve another one.</a>";
	}
	else
	{
	    echo "There was a problem saving your data.";
	    echo "<br /><a href = 'reservation.html'>Try again.</a>";
	    echo "Or come back another time.";
	}
    }
	 if (isset($_POST['change'])) // if the change button is clicked.
    {
	// echo the whole block
	echo<<<MYFORM
	<form action = "$_SERVER[PHP_SELF]" method = "POST">
	<p>Please enter your confirmation number:
	<input type = "text" size = "9" name = "cfNumber" maxlength = "9" />
	<br />
	<table border = "1">
 	<tr>  
 	 <td>New Check in Date:</td>
	  <td><input type = "text" name = "checkIn" size = "8" maxlength = "16" />(yyyy-mm-dd)</td>
	 </tr>
 	<tr>
	  <td>New Check out Date:</td>
 	 <td><input type = "text" name = "checkOut" size = "8" maxlength = "16" />(yyyy-mm-dd)</td>
	 </tr>
	 <tr>
 	 <td>New Room type:</td>
 	 <td><select name = "room" size = "1">
		<option value = 'Standard Smoking'>Standard Smoking</option>
	   	<option value = 'Standard Non-smoking'>Standard Non-smoking</option>
	      	<option value = 'Double Smoking'>Double Smoking</option>
	      	<option value = 'Double Non-smoking'>Double Non-smoking</option> 
	     </select>
	 </td>
 	</tr>
	</table>
	</p>
	<input type = "submit" name = "modify" value = "Make the change" />
	</form>
MYFORM;
    }

    elseif (isset($_POST['modify'])) // if the modify button is clicked.
    {
	// collect new data from the customer.
	$cfNumber = $_POST['cfNumber'];
	$newCheckIn = $_POST['checkIn'];
	$newCheckOut = $_POST['checkOut'];
	$newType = $_POST['room'];
	// check if the confirmation number matches the one in database
	if (mysqli_num_rows(mysqli_query($conn, "SELECT confirm from reservation WHERE confirm = '$cfNumber'")))
{
	// Update the table
	$statement = "UPDATE reservation SET checkIn = '$newCheckIn',
	 checkOut = '$newCheckOut', type = '$newType' WHERE confirm = '$cfNumber'";

	// if the record is successfully updated
	if ($result = mysqli_query($conn, $statement))
	{
	    echo "One record modified.";
	}
	else
	{
	    echo "There was a problem updating your data.";
	}
   
}
else
{
echo "No reservation found. Check your number and <a href='PHPLesson14b.html'>try again</a>";
}
}
    if (isset($_POST['delete'])) // If the delete button is clicked.
    {
	// echo the whole block
	echo<<<MYFORM
	<form action = "$_SERVER[PHP_SELF]" method = "POST">
	<p>Please enter your confirmation number to delete your reservation:
	<input type = "text" size = "9" name = "cfNumber" maxlength = "9" />

	<input type = "submit" name = "realDelete" value = "Delete My Reservation" />
	</form>
MYFORM;
    }
mysqli_close($conn); 
?>
</body>

</html>

