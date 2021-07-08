<?php
include "../utils/SQL.php";

session_start();
session_unset();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username-login'];
    $password = $_POST['password-login'];

    try {
        $mysqli = get_connection();
    } catch (Exception $e) {
        echo "Failed to connect to database. Reason: " . $e;
        exit();
    }

    $uid = get_user_by_credentials($mysqli, $username, $password);

    if (!$uid) {
        header("Location: /panel?err=1");
    } else {
        $_SESSION["uid"] = $uid;
        $_SESSION["username"] = $username;
        header("Location: /panel");
    }
    exit();
} else {
    echo 'Only Post requests are supported!';
}
