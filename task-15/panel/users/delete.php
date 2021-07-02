<?php 
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();

$mysqli = get_connection();

delete_user($mysqli, $_GET["uid"]);

header("Location: /panel/users");