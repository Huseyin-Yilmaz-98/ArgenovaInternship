<?php
include "../../utils/SQL.php";

$mysqli = get_connection();
$users = get_all_users($mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel / Users</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php require "../header.php"; ?>
    <div class="w-100 d-flex justify-content-center">
        <a href="/panel/users/new-user.php" class="text-white mb-3 fs-4">New User</a>
    </div>

    <table class="table table-light w-75 mx-auto table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Username</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <th scope="row"><?php echo $user[0]; ?></th>
                    <td><?php echo $user[1]; ?></td>
                    <td><a href="delete.php?uid=<?php echo $user[0]; ?>">Delete</a></td>
                    <td><a href="edit-user.php?uid=<?php echo $user[0]; ?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>