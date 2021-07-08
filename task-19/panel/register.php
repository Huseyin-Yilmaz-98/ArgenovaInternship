<?php
include "../utils/SQL.php";

session_start();
session_unset();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username-register'];
    $password = $_POST['password-register'];

    try {
        $mysqli = get_connection();
    } catch (Exception $e) {
        echo "Failed to connect to database. Reason: " . $e;
        exit();
    }

    try{
        $uid = create_user($mysqli, $username, $password);
        if(!$uid){
            header("Location: /panel?err=2");
        } else{
            $_SESSION["uid"] = $uid;
            $_SESSION["username"] = $username;
            header("Location: /panel");
        }
        exit();
    }catch(Exception $e){
        echo "Failed to insert. Reason: " . $e;
    }
} else {
    echo 'Only Post requests are supported!';
}
//$conn = new mysqli("localhost", "root", "root");
