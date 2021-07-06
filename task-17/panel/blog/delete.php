<?php 
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();
$mysqli = get_connection();

delete_blog_entry($mysqli, $_GET["beid"]);

header("Location: /panel/blog");