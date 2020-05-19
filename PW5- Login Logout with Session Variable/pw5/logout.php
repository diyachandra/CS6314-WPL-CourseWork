<?php
setcookie("name", $name, time() - 3600, "/");
setcookie("email", $email, time() - 3600, "/");
header("Location: login.html");
