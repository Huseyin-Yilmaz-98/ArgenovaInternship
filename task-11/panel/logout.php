<?php
session_start();
session_unset();
session_destroy();

header("Location: /panel/my-account.php");
exit();
?>