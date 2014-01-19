<?php
$passkey = $_GET['confirmationcode'];
include "connect_to_mysql.php";
$passkey = preg_replace('#[^A-Za-z0-9@.]#i', '', $passkey);
$sql = mysql_query("SELECT * FROM temp_users WHERE passkey='$passkey' LIMIT 1");
$existCount = mysql_num_rows($sql);
if($existCount == 1) {
	$row = mysql_fetch_array($sql);
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$email = $row['email'];
	$password = $row['password'];
	$birthdate = $row['birthdate'];
	$insorgname = $row['insorgname'];
	$bloodgroup = $row['bloodgroup'];
	$phone = $row['phone'];
	$location = $row['location'];
	$reference = $row['reference'];
	mysql_query("INSERT INTO users VALUES ('', '$firstname', '$lastname', '$birthdate', '$insorgname', '$bloodgroup', '$phone', '$location', '$email', '$password', '$reference')");
	session_save_path("/home/content/28/10504428/html");
	session_start();
	echo "<script type=\"text/javascript\">
	alert('You are ready to use your account now!');
	window.location.href='login.php';
	</script>";
}
else {
	echo "<script type=\"text/javascript\">
	alert('An error has occured!');
	window.location.href='index.html';
	</script>";
}
?>