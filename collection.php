<?php
require_once './config/setup.php';

$errors = [];
$success = false;

/*
** Sanitizing the user input
*/
if ($_POST["fullname"] != "" && $_POST["email"] != "")
{
    if (isset($_POST['fullname']) && $_POST['fullname'] != ""){
		if(preg_match("/^([a-zA-Z' ]+)$/",trim($_POST['fullname']))){
			$var_name = trim($_POST['fullname']);
		}else{
			array_push($errors, "Invalid name given.");
		}
	}

    if (isset($_POST['email']) && $_POST['email'] != ""){
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$var_email = $_POST['email'];
		}
		else{
			array_push($errors, "Invalid email address");
		}
	}
}
else
  array_push($errors, "Please fill up the required fields");


/*
** Inserting data into database
*/
if (isset($_POST["subscribe"]) && count($errors) == 0 && $_POST["fullname"] != "" && $_POST["email"] != "")
{
    if($_POST["subscribe"] === "Subscribe")
	{
        $name = $var_name;
        $email = $var_email;

        $sql = "INSERT INTO `users` (`name`, `email`) VALUES (?, ?)";
		$stmt= $con->prepare($sql);
		$result = $stmt->execute([$name, $email]);
        if ($result)
            $success = true;
    }
}
?>