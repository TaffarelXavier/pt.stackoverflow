<?php
$ini = parse_ini_file('config.ini');
$host = "localhost";
$user = "root";
$password = "chkdsk";
$banco = "testedb";

$link = mysqli_connect($host, $user, $password) or die(mysqli_error());

$db = mysqli_select_db($link, $banco);

$query = sprintf("SELECT * FROM strapi_administrator");

if ($result->num_rows > 0) {
	// Outputting the rows
	while ($row = $result->fetch_assoc()) {

		$password = $row['password'];
		$salt = $row['salt'];
		$plain_pass = $_GET['password'];
		$stored_pass = md5(md5($salt) . md5($plain_pass));

		function Redirect($url, $permanent = false)
		{
			if (headers_sent() === false) {
				header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
			}
			exit();
		}

		if ($stored_pass != $row['password']) {
			echo "0"; // Wrong pass, user exists
		} else {
			echo "1"; // Correct pass
		}
	}
} else {
	echo "2"; // User doesn't exist
}



//-----------------------------------------------------
// Coded by /id/Thaisen! Free loader source
// https://github.com/ThaisenPM/Cheat-Loader-CSGO-2.0
// Note to the person using this, removing this
// text is in violation of the license you agreed
// to by downloading. Only you can see this so what
// does it matter anyways.
// Copyright © ThaisenPM 2017
// Licensed under a MIT license
// Read the terms of the license here
// https://github.com/ThaisenPM/Cheat-Loader-CSGO-2.0/blob/master/LICENSE
//-----------------------------------------------------
?>

<head>
	<title>Checking login info</title>
</head>