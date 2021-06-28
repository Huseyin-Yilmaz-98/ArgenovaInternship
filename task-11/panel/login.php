<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username-login'];
    $password = $_POST['password-login'];

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'argenova';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno){
        echo "No database connection!";
    }

    $stmt = $mysqli->prepare("SELECT uid FROM users WHERE username = ? AND password = ?");

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($uid = $result->fetch_row()){
        session_start();
        session_unset();
        $_SESSION["uid"] = $uid;
        $_SESSION["username"] = $username;
        header("Location: /panel/my-account.php");
    }
    else{
        header("Location: /panel/my-account.php?err=1");
    }
    exit();
}
else{
    echo 'Only Post requests are supported!';
}
//$conn = new mysqli("localhost", "root", "root");
