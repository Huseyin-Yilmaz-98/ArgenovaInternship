<?php session_start();
function check_session(){
    if (!isset($_SESSION["uid"])) {
        header("Location: /panel");
        exit();
    }
}
