<?php
$error = false;
$email = $_POST['email'];
$password = $_POST['password'];
if($email == "" && $password == "") {
	$reason = "noemailpassword";
}
else if($email == "" && $password != "") {
	$reason = "noemail";
}
else if($email != "" && $password == "") {
	$reason = "nopassword";
}
if($email == "" || $password == "") {
	$error = true;
}
else {
	if($error == false) {
		$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email); 
		$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);
		include "connect_to_mysql.php";
		$sql = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1");
		$existCount = mysql_num_rows($sql);
		if ($existCount == 0) {
			$reason = "norecord";
			$error = true;
		}
		if ($existCount == 1) {
			$row = mysql_fetch_array($sql);
			session_save_path("/home/content/28/10504428/html");
			session_start();
			$_SESSION['email'] = $row['email'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['bloodgroup'] = $row['bloodgroup'];
			$_SESSION['location'] = $row['location'];
		}
	}
}
if ($error == true) {
	$url = "login.php?loginFailed=true&reason=" . $reason;
}
else if($error == false) {
	$url = "user_home.php";
}
header("location: " . $url);
exit();
/*	if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {
		$admin_username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['admin_username']); 
    	$admin_password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['admin_password']); 
    	include "scripts/connect_to_mysql.php"; 
    	$sql = mysql_query("SELECT * FROM admin WHERE username='$admin_username' AND password='$admin_password' LIMIT 1"); 
		$existCount = mysql_num_rows($sql);
    	if ($existCount == 1) { 
			 while($row = mysql_fetch_array($sql)){ 
            	 $_SESSION['admin_id'] = $row['id'];
            	 $_SESSION['admin_first_name'] = $row['first_name'];
            	 $_SESSION['admin_last_name'] = $row['last_name'];
            	 $_SESSION['admin_email'] = $row['email'];	
            	 $_SESSION['admin_gender'] = $row['gender'];
             }
		 	 $_SESSION['admin_username'] = $admin_username;
			 $_SESSION['admin_password'] = $admin_password;
			 header ("location: admin_index.php");
			 exit(); 
    } 
	else {
		echo 'That information is incorrect, try again <a href="admin_login.php">Click Here</a>';
		exit();
	}
} */
?>