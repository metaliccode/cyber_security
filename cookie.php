<?php

// setcookie("user", "ihsan");
// echo $_COOKIE['user'];

// if (!isset($_COOKIE['user'])) {
//     setcookie("user", "ihsan");
// } else {
//     echo "Welcome, " . $_COOKIE['user'];
// }

// lebih baik menggunakan session
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION["user"] = "ihsan";
} else {
    echo "Welcome, " . $_SESSION['user'];
}
