<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username-register'];
    $password = $_POST['password-register'];

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'argenova';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($mysqli->connect_errno){
        echo "No database connection!";
    }

    $stmt = $mysqli->prepare("INSERT INTO users(username, password) VALUES(?, ?);");

    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()){
        session_start();
        session_unset();
        $_SESSION["uid"] = $stmt->insert_id;
        $_SESSION["username"] = $username;
        header("Location: /panel/my-account.php");
    }
    else{
        header("Location: /panel/my-account.php?err=2");
    }
    exit();
}
else{
    echo 'Only Post requests are supported!';
}
//$conn = new mysqli("localhost", "root", "root");
