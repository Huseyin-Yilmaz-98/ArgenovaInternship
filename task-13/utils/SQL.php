<?php

use JetBrains\PhpStorm\ExpectedValues;

function get_connection()
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbname = 'argenova';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_error) {
        throw new Exception("Failed to connect to database. Error: " . $mysqli->connect_error);
    }

    return $mysqli;
}

function create_user($mysqli, $username, $password)
{
    $stmt = $mysqli->prepare("INSERT IGNORE INTO users(username, password) VALUES(?, ?);");

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $username, $password_hash);

    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    if ($stmt->affected_rows == 0) {
        return false;
    }

    return $stmt->insert_id;
}

function get_user_by_credentials($mysqli, $username, $password)
{
    $stmt = $mysqli->prepare("SELECT uid, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result = $result->fetch_row()) {
        if (password_verify($password, $result[1])) {
            return $result[0];
        }
    }

    return false;
}

function get_user_by_id($mysqli, $uid)
{
    $stmt = $mysqli->prepare("SELECT username FROM users WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result = $result->fetch_row()) {
        return $result[0];
    }

    return false;
}

function get_all_users($mysqli){
    $stmt = $mysqli->prepare("SELECT uid, username FROM users");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all();
}

function delete_user($mysqli, $uid){
    $stmt = $mysqli->prepare("DELETE FROM users WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
}

function edit_user($mysqli, $uid, $username, $password){
    $stmt = $mysqli->prepare("UPDATE IGNORE users SET username = ?, password = ? WHERE uid = ?");
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssi", $username, $password_hash, $uid);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        return false;
    }

    return true;
}
