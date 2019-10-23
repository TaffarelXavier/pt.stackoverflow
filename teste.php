<?php
session_start();
include_once("conexao.php");
$ini = parse_ini_file('config.ini');
$host = "localhost";
$user = "root";
$password = "";
$banco = "mybb_usertable";
$link = mysqli_connect($host, $user, $password) or die(mysqli_error());
$db = mysqli_select_db($link, $banco);
$query = sprintf("SELECT identificador, username, password FROM mybb_usertable");

if ($result->num_rows > 2) {
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
