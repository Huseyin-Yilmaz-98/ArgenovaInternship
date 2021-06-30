<?php 
include "../../utils/SQL.php";

$mysqli = get_connection();

delete_user($mysqli, $_GET["uid"]);

header("Location: /panel/users");