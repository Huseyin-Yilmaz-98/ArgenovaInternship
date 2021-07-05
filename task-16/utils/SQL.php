<?php

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

function get_all_users($mysqli)
{
    $stmt = $mysqli->prepare("SELECT uid, username FROM users");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all();
}

function delete_user($mysqli, $uid)
{
    $stmt = $mysqli->prepare("DELETE FROM users WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
}

function edit_user($mysqli, $uid, $username, $password)
{
    $stmt = $mysqli->prepare("UPDATE IGNORE users SET username = ?, password = ? WHERE uid = ?");
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssi", $username, $password_hash, $uid);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        return false;
    }

    return true;
}


function get_all_blog_entries($mysqli)
{
    $stmt = $mysqli->prepare("SELECT beid, image_name, username, created_at, category, content, title FROM blog_entries INNER JOIN users ON uid = author; ");
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all();
}

function get_blog_entry_by_id($mysqli, $beid)
{
    $stmt = $mysqli->prepare("SELECT beid, image_name, username, created_at, category, content, title FROM blog_entries INNER JOIN users ON uid = author WHERE beid = ?;");
    $stmt->bind_param("i", $beid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result = $result->fetch_row()) {
        return $result;
    }

    return false;
}

function delete_blog_entry($mysqli, $beid)
{
    $stmt = $mysqli->prepare("DELETE FROM blog_entries WHERE beid = ?");
    $stmt->bind_param("i", $beid);
    $stmt->execute();
}

function create_blog_entry($mysqli, $image, $category, $title, $content, $author)
{
    $stmt = $mysqli->prepare("INSERT INTO blog_entries(image_name, category, title, content, author) VALUES(?, ?, ?, ?, ?);");

    $stmt->bind_param("ssssi", $image, $category, $title, $content, $author);

    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    return $stmt->insert_id;
}

function edit_blog_entry($mysqli, $beid, $image, $category, $title, $content, $author)
{
    $stmt = $mysqli->prepare("UPDATE blog_entries SET image_name = ?, category = ?, title = ?, content = ?, author = ? WHERE beid = ?");
    $stmt->bind_param("ssssii", $image, $category, $title, $content, $author, $beid);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        return false;
    }

    return true;
}

function delete_comment($mysqli, $id)
{
    $stmt = $mysqli->prepare("DELETE FROM comments WHERE cid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function create_comment($mysqli, $name, $email, $comment, $beid)
{
    $stmt = $mysqli->prepare("INSERT INTO comments(author_name, author_email, comment, post_id) VALUES(?, ?, ?, ?);");

    $stmt->bind_param("sssi", $name, $email, $comment, $beid);

    if (!$stmt->execute()) {
        throw new Exception($stmt->error);
    }

    return $stmt->insert_id;
}

function get_post_comments($mysqli, $beid)
{
    $stmt = $mysqli->prepare("SELECT author_name, created_at, comment FROM comments WHERE post_id = ?");
    $stmt->bind_param("i", $beid);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all();
}

function get_all_comments($mysqli){
    $stmt = $mysqli->prepare("SELECT cid, author_name, author_email, blog_entries.created_at, comment, title, post_id FROM comments INNER JOIN blog_entries ON post_id = beid");

    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all();
}
