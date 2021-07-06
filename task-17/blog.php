<?php
include "./utils/SQL.php";
try {
    $mysqli = get_connection();
} catch (Exception $e) {
    echo "Failed to connect to database. Reason: " . $e;
    exit();
}
$entries = array_reverse(get_all_blog_entries($mysqli));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <?php require("header.php") ?>
    <div class="breadcrumbs d-flex flex-column justify-content-center align-items-center w-100">
        <h1 class="text-white">Blog</h1>
        <div class="d-flex flex-row">
            <a class="text-white mx-2" style="text-decoration: none;" href="index.php">Home</a>
            <p class="text-white mx-2">/</p>
            <p class="text-white mx-2">Blog</p>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-11 col-sm-10 col-xxl-8 mx-auto d-flex blog-container justify-content-center py-5">
                <div class="blog-container-left px-2">

                    <?php
                    foreach ($entries as $entry) { ?>
                        <div class="w-100 shadow-box p-3 mb-5">
                            <div class="position-relative w-100">
                                <button class="position-absolute blog-button text-white px-3 py-1 m-3">Application Testing</button>
                                <a href="blog-details.php?id=<?= $entry[0] ?>"><img class="w-100 h-auto" src="/images/Blog/<?= $entry[1] ?>" style="border-radius: 16px;"></a>

                            </div>
                            <div class="p-3">
                                <a href="blog-details.php?id=<?= $entry[0] ?>" class="fw-bold text-dark fs-3"><?= $entry[6] ?></a>
                                <div class="d-flex my-2" style="font-size: 0.9em;">
                                    <i class="fa fa-calendar-check-o text-primary fw-bold p-1 pe-2"></i>
                                    <em class="text-muted"><?= $entry[3] ?></em>
                                    <i class="fa fa-user-o text-primary fw-bold p-1 pe-2 ps-5"></i>
                                    <em class="text-muted"><?= $entry[2] ?></em>
                                </div>
                                <p class="my-3"><?= substr($entry[5], 0, 100) . "..." ?></p>
                                <a href="blog-details.php?id=<?= $entry[0] ?>" class="text-primary fw-bold">Continue Reading <i class="fa fa-arrow-right ps-2"></i></a>
                            </div>
                        </div>
                    <?php  } ?>


                </div>
                <div class="blog-container-right px-2">
                    <div class="w-100 shadow-box p-4 mb-4" style="position: relative;">
                        <button type="submit" class="py-3 px-5 mw-auto position-absolute bg-transparent border-0" style="right: 0;">
                            <i class="fa fa-search fs-5 text-black-50"></i>
                        </button>
                        <input class="form-control p-3 w-100" type="text" placeholder="Searching...">
                    </div>

                    <div class="w-100 shadow-box p-4 my-4">
                        <h5 class="fw-bold mt-3">Latest Posts</h5>
                        <hr style="border: 1.5px solid darkblue; width: 3em;">

                        <?php
                        foreach ($entries as $entry) { ?>
                            <div class="latest-posts-item col-12 col-lg-12 d-flex pt-3 pe-2 my-3">
                                <div class="col-3 col-sm-3">
                                    <img src="/images/Blog/<?= $entry[1] ?>" class="w-100 h-auto">
                                </div>
                                <div class="col-1 col-sm-1"></div>
                                <div class="col-8 col-sm-8">
                                    <a href="blog-details.php?id=<?= $entry[0] ?>" class="text-dark fw-bold"><?= $entry[6] ?></a>
                                    <div class="d-flex my-2" style="font-size: 0.9em;">
                                        <i class="fa fa-calendar-check-o text-dark fw-bold p-1 pe-2"></i>
                                        <em class="text-muted"><?= $entry[3] ?></em>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>

                    <div class="w-100 shadow-box p-4 my-4">
                        <h5 class="fw-bold mt-3">Categories</h5>
                        <hr style="border: 1.5px solid darkblue; width: 3em;">
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">Application Testing</a>
                        </div>
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">Artifical Intelligence</a>
                        </div>
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">Digital Technology</a>
                        </div>
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">IT Services</a>
                        </div>
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">Software Development</a>
                        </div>
                        <div class="categories-item pt-3 my-3">
                            <a href="blog.php" class="text-dark fw-bold">Web Development</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("footer.php") ?>
    <script src="script.js"></script>
</body>

</html>