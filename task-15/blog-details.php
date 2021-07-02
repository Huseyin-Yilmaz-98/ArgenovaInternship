<?php
include "./utils/SQL.php";
include "./utils/blog.php";
try {
    $mysqli = get_connection();
} catch (Exception $e) {
    echo "Failed to connect to database. Reason: " . $e;
    exit();
}

if (!isset($_GET["id"])) {
    $beid = 0;
} else {
    $beid = $_GET["id"];
}

$details = get_blog_entry_by_id($mysqli, $beid);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $details[6]?></title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <?php require("header.php") ?>
    <div class="breadcrumbs d-flex flex-column justify-content-center align-items-center w-100">
        <h1 class="text-white fw-bold"><?= $details[6]?></h1>
        <div class="d-flex flex-row">
            <a class="text-white mx-2" style="text-decoration: none;" href="index.php">Home</a>
            <p class="text-white mx-2">/</p>
            <p class="text-white mx-2">Blog</p>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-11 col-sm-10 col-xxl-8 mx-auto d-flex blog-container justify-content-center py-5">
                <div class="blog-container-left px-5">
                    <img src="images/Blog/<?= $details[1] ?>" class="w-100 h-auto mb-4">
                    <div class="d-flex my-2" style="font-size: 0.9em;">
                        <i class="fa fa-calendar-check-o text-primary fw-bold p-1 pe-2"></i>
                        <em class="text-muted"><?= $details[3] ?></em>
                        <i class="fa fa-user-o text-primary fw-bold p-1 pe-2 ps-3"></i>
                        <em class="text-muted"><?= $details[2] ?></em>
                        <i class="fa fa-book text-primary fw-bold p-1 pe-2 ps-3"></i>
                        <em class="text-muted"><?= $details[4] ?></em>
                        <i class="fa fa-comments-o text-primary fw-bold p-1 pe-2 ps-3"></i>
                        <em class="text-muted">1</em>
                    </div>
                    <?php
                    echo content_to_html($details[5]);
                    ?>
                    <div class="py-4">
                        <h4 class="fw-bold">1 comment on “<?= $details[6]?>”</h4>
                        <div class="row py-4">
                            <div class="col-3 col-sm-3 col-md-2">
                                <img src="images/Blog/admin-pp.png" class="w-75 h-auto rounded-circle">
                            </div>
                            <div class="col-9 col-sm-9 col-md-10">
                                <p class="fw-bold mb-2">Admin</p>
                                <p class="text-muted mb-2 fst-italic">December 3, 2020 at 8:30 am</p>
                                <p>Aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est</p>
                                <button class="blue-gradient-bg px-3 text-white" style="border-radius: 16px;">Reply</button>
                            </div>
                        </div>
                    </div>

                    <form class="pt-5" style="border-top: 1px solid lightgray;">
                        <h4 class="fw-bold">Leave a Reply</h4>
                        <p class="text-muted mt-5">Your email address will not be published. Required fields are marked *</p>
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <input type="text" class="form-control bg-light py-3" placeholder="Name *">
                            </div>
                            <div class="col-md-6 mt-4">
                                <input type="text" class="form-control bg-light py-3" placeholder="E-mail *">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div>
                                <textarea class="w-100 form-control bg-light py-3" rows="6" placeholder="Your message here"></textarea>
                            </div>
                        </div>
                        <button class="text-white my-5 p-2 blue-gradient-bg" style="border-radius: 24px;" type="submit">Post Comment</button>
                    </form>

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
                        <div class="latest-posts-item col-12 col-lg-12 d-flex pt-3 pe-2 my-3">
                            <div class="col-3 col-sm-3">
                                <img src="images/Blog/1.jpg" class="w-100 h-auto">
                            </div>
                            <div class="col-1 col-sm-1"></div>
                            <div class="col-8 col-sm-8">
                                <a href="blog.php" class="text-dark fw-bold">Pen Source Job Report Show More Openings Fewer</a>
                                <div class="d-flex my-2" style="font-size: 0.9em;">
                                    <i class="fa fa-calendar-check-o text-dark fw-bold p-1 pe-2"></i>
                                    <em class="text-muted">January 21, 2020</em>
                                </div>
                            </div>
                        </div>

                        <div class="latest-posts-item col-12 col-lg-12 d-flex pt-3 pe-2 my-3">
                            <div class="col-3 col-sm-3">
                                <img src="images/Blog/2.jpg" class="w-100 h-auto">
                            </div>
                            <div class="col-1 col-sm-1"></div>
                            <div class="col-8 col-sm-8">
                                <a href="blog.php" class="text-dark fw-bold">Tech Products That Makes Its Easier to Stay at Home</a>
                                <div class="d-flex my-2" style="font-size: 0.9em;">
                                    <i class="fa fa-calendar-check-o text-dark fw-bold p-1 pe-2"></i>
                                    <em class="text-muted">January 21, 2020</em>
                                </div>
                            </div>
                        </div>

                        <div class="latest-posts-item col-12 col-lg-12 d-flex pt-3 pe-2 my-3">
                            <div class="col-3 col-sm-3">
                                <img src="images/Blog/3.jpg" class="w-100 h-auto">
                            </div>
                            <div class="col-1 col-sm-1"></div>
                            <div class="col-8 col-sm-8">
                                <a href="blog.php" class="text-dark fw-bold">Necessity May Give Us Your Best Virtual Court System</a>
                                <div class="d-flex my-2" style="font-size: 0.9em;">
                                    <i class="fa fa-calendar-check-o text-dark fw-bold p-1 pe-2"></i>
                                    <em class="text-muted">January 21, 2020</em>
                                </div>
                            </div>
                        </div>

                        <div class="latest-posts-item col-12 col-lg-12 d-flex pt-3 pe-2 my-3">
                            <div class="col-3 col-sm-3">
                                <img src="images/Blog/4.jpg" class="w-100 h-auto">
                            </div>
                            <div class="col-1 col-sm-1"></div>
                            <div class="col-8 col-sm-8">
                                <a href="blog.php" class="text-dark fw-bold">Servo Project Joins The Linux Foundation Fold Desco</a>
                                <div class="d-flex my-2" style="font-size: 0.9em;">
                                    <i class="fa fa-calendar-check-o text-dark fw-bold p-1 pe-2"></i>
                                    <em class="text-muted">January 21, 2020</em>
                                </div>
                            </div>
                        </div>
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