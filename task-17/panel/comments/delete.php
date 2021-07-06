<?php 
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();

$mysqli = get_connection();

delete_comment($mysqli, $_GET["cid"]);

header("Location: /panel/comments");