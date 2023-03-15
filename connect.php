<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Email = $_POST['Email'];
	$ID = $_POST['ID'];

	// Database connection
	$conn = new mysqli('localhost','root','','regis');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO registrations(fname, lname, Email, ID) values(?, ?, ?, ?)");
		$stmt->bind_param('sssi', $fname, $lname, $Email, $ID);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>