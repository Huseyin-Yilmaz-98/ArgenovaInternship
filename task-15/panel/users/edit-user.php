<?php
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["uid"])) {
        header("Location: /panel/users/index.php");
        exit();
    }
    $uid = $_GET["uid"];
    $mysqli = get_connection();
    $username = get_user_by_id($mysqli, $uid);

    if (!$username) {
        header("Location: /panel/users/new-user.php");
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel / Users/ Edit User</title>
        <link rel="stylesheet" href="/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../../style.css">
    </head>


    <body>
        <?php require "../../header.php"; ?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-4 mx-auto text-dark">
                    <h1 class="fw-bold mb-4 text-center">Edit User</h1>
                    <form action="?" class="w-100 border p-5 d-flex flex-column align-items-center" method="POST">
                        <label for="uid" class="fw-bold mb-1">User ID</label>
                        <input type="text" id="uid" name="uid" class="form-control mb-3" value="<?php echo $uid; ?>" readonly>
                        <label for="username" class="fw-bold mb-1">New Username</label>
                        <input type="text" id="username" name="username" class="form-control mb-3" value="<?php echo $username; ?>" required>
                        <label for="password-login" class="fw-bold mb-1">New Password</label>
                        <input type="text" id="password" name="password" class="form-control mb-3" required>
                        <div class="my-4">
                            <input type="submit" value="Edit" class="btn btn-primary px-5 py-2 text-white">
                        </div>
                        <?php if (isset($_GET["err"]) && $_GET["err"] == 1) { ?>
                            <p class="text-danger fw-bold fs-5">This username already exists!</p>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <?php require("../../footer.php") ?>

    </body>

    </html>

<?php } else {
    $uid = $_POST["uid"];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $mysqli = get_connection();
    } catch (Exception $e) {
        echo "Failed to connect to database. Reason: " . $e;
        exit();
    }

    $result = edit_user($mysqli, $uid, $username, $password);
    if (!$result) {
        header("Location: ?err=1&uid=" . $uid);
    } else {
        header("Location: /panel/users/index.php");
    }
    exit();
} ?>