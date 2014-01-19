<?php
$error = false;
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['datepicker'];
$insorgname = $_POST['insorgname'];
$bloodgroup = $_POST['bloodgroup'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$reference = $_POST['reference'];
if ($firstname == "" || $lastname == "" || $birthdate == "" || $insorgname == "" || $reference == "" || $email == "" || $password == "" || $confirmpassword == "" || $location == "") {
	$error = true;
	$reason = "nofields";
}
if($error == false) {
	$firstname = preg_replace('#[^A-Za-z0-9@.]#i', '', $firstname); 
	$lastname = preg_replace('#[^A-Za-z0-9]#i', '', $lastname);
	$birthdate = preg_replace('#[^A-Za-z0-9@.]#i', '', $birthdate); 
	$insorgname = preg_replace('#[^A-Za-z0-9]#i', '', $insorgname);
	$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email); 
	$reference = preg_replace('#[^A-Za-z0-9@.]#i', '', $reference); 
	$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);
	$confirmpassword = preg_replace('#[^A-Za-z0-9]#i', '', $confirmpassword);
	$phone = preg_replace('#[^+0-9]#i', '', $phone);
	$location = preg_replace('#[^A-Za-z0-9]#i', '', $location);
	$location = strtolower($location);
	if ($password != $confirmpassword) {
		$reason = password;
		$error = true;
	}
	if($error == false) {
		include "connect_to_mysql.php";
		$sql = mysql_query("SELECT * FROM users WHERE email='$email' LIMIT 1");
		$existCount = mysql_num_rows($sql);
		$sqlAnother = mysql_query("SELECT * FROM temp_users WHERE email='$email' LIMIT 1");
		$existCount = $existCount + mysql_num_rows($sqlAnother);
		$checkReference = mysql_query("SELECT * FROM users WHERE email='$reference' LIMIT 1");
		$checkReferenceCount = mysql_num_rows($checkReference);
		if($existCount != 0) {
			$error = true;
			$reason = existing;
		}
		else if($checkReference == 0) {
			$error = true;
			$reason = noreference;
		}
		else {
			$passkey = md5($email);
			mysql_query("INSERT INTO temp_users VALUES ('$passkey', '$firstname', '$lastname', '$birthdate', '$insorgname', '$bloodgroup', '$phone', '$location', '$email', '$password', '$reference')");
			$to = $email;
			$subject = "AadhaarFoundation registration!";
			$message = "Your registration with aadhaar foundation is successful! To activate your account, click on the link given http://aadhaarfoundation.org/confirm.php?confirmationcode=" . $passkey;
			mail($to, $subject, $message);
			echo "<script type=\"text/javascript\">
			alert('Account created.');
			window.location.href='thankregister.html';
			</script>"; 
		}
	}
}
if($error == true) {
	header("location: register.php?registerFailed=true&reason=" . $reason);
}
?>