<?php
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();

$mysqli = get_connection();
$entries = get_all_blog_entries($mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel / Blog Entries</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <?php require "../../header.php"; ?>
    <div class="w-100 d-flex justify-content-center">
        <a href="/panel/blog/new-entry.php" class="my-3 fs-4">New Entry</a>
    </div>

    <table class="table table-light w-75 mx-auto table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Entry Id</th>
                <th scope="col">Title</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry) { ?>
                <tr>
                    <th scope="row"><?php echo $entry[0]; ?></th>
                    <td><?php echo $entry[6]; ?></td>
                    <td><a href="delete.php?beid=<?php echo $entry[0]; ?>">Delete</a></td>
                    <td><a href="edit-entry.php?beid=<?php echo $entry[0]; ?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php require("../../footer.php") ?>
</body>

</html>