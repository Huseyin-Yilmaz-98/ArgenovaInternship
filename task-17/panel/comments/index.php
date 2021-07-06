<?php
include "../../utils/SQL.php";
include "../../utils/CMS.php";
check_session();

$mysqli = get_connection();
$comments = get_all_comments($mysqli);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel / Comments</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <?php require "../../header.php"; ?>

    <table class="table table-light w-75 mx-auto table-striped table-bordered my-4">
        <thead>
            <tr>
                <th scope="col">Comment ID</th>
                <th scope="col">Comment</th>
                <th scope="col">Post</th>
                <th scope="col">Author Email</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment) { ?>
                <tr>
                    <th scope="row"><?php echo $comment[0]; ?></th>
                    <td><?php echo $comment[4]; ?></td>
                    <td><a href="/blog-details.php?id=<?= $comment[6]?>"><?php echo $comment[5]; ?></a></td>
                    <td><?php echo $comment[2]; ?></td>
                    <td><?php echo $comment[3]; ?></td>
                    <td><a href="delete.php?cid=<?php echo $comment[0]; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php require("../../footer.php") ?>
</body>

</html>