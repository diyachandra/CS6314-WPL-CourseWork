<?php
$name = $email = $password = "";
session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$v ="/[a-zA-z0-9.-]+\@[a-zA-Z0-9.-]+.[a-zA-Z]+/";
$bool = preg_match($v, $email);

if ($bool) {
    if (strlen($password)>=6) {
        //$_SESSION['user'] = $name;
        //$_SESSION['password'] = $password;
        setcookie("name", $name, time() + (86400 * 30), "/");
        setcookie("email", $email, time() + (86400 * 30), "/");
        header("Location: welcome.php");
    } else {
        header("Location: login.html");
    }
} else {
    header("Location: login.html");
}
