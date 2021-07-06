<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("../header.php") ?>
    <div class="breadcrumbs d-flex flex-column justify-content-center align-items-center w-100">
        <h1 class="text-white">Panel</h1>
        <div class="d-flex flex-row">
            <a class="text-white mx-2" style="text-decoration: none;">Home</a>
            <p class="text-white mx-2">/</p>
            <p class="text-white mx-2">Panel</p>
        </div>
    </div>

    <div class="container-fluid bg-white">
        <div class="row mx-auto py-5">
            <div class="col-md-2"></div>
            <?php if (!isset($_SESSION["uid"])) { ?>
                <div class="col-md-4 px-2">
                    <h1 class="fw-bold mb-4">Login</h1>
                    <form action="/panel/login.php" class="w-100 border p-3 d-flex flex-column" method="POST">

                        <label for="username-login" class="fw-bold mb-1">Username*</label>
                        <input type="text" id="username-login" name="username-login" class="form-control" required>
                        <label for="password-login" class="fw-bold mb-1">Password*</label>
                        <input type="text" id="password-login" name="password-login" class="form-control" required>
                        <div class="my-4">
                            <input type="submit" value="Log In" class="blue-gradient-bg px-5 py-2 text-white">
                            <input type="checkbox" id="remember-me" name="remember-me">
                            <label for="remember-me">Remember Me</label>
                        </div>
                        <?php if (isset($_GET["err"]) && $_GET["err"] == 1) { ?>
                            <p class="text-danger fw-bold">Invalid username or password!</p>
                        <?php } ?>
                    </form>
                </div>

                <div class="col-md-4 px-2">
                    <h1 class="fw-bold mb-4">Register</h1>
                    <form action="/panel/register.php" class="w-100 border p-3 d-flex flex-column" method="POST">

                        <label for="username-register" class="fw-bold mb-1">Username*</label>
                        <input type="text" id="username-register" name="username-register" class="form-control" required>
                        <label for="password-register" class="fw-bold mb-1">Password*</label>
                        <input type="text" id="password-register" name="password-register" class="form-control" required>
                        <div class="my-4">
                            <input type="submit" value="Sign Up" class="blue-gradient-bg px-5 py-2 text-white">
                        </div>
                        <?php if (isset($_GET["err"]) && $_GET["err"] == 2) { ?>
                            <p class="text-danger fw-bold">Username already exists!</p>
                        <?php } ?>
                    </form>
                </div>

            <?php } else { ?>
                <div class="col-md-8 border p-3 d-flex flex-column justify-content-center align-items-center">
                    <h1>You are logged in as <?php echo $_SESSION["username"]; ?></h1>
                    <a href="/panel/blog" class="fw-bold mt-3 fs-5">Blog Posts</a>
                    <a href="/panel/users" class="fw-bold mt-3 fs-5">Users</a>
                    <a href="/panel/comments" class="fw-bold mt-3 fs-5">Comments</a>
                    <a href="/panel/logout.php" class="fw-bold mt-4 fs-4">Log Out</a>
                </div>
            <?php } ?>
            <div class="col-md-2"></div>
        </div>
    </div>

    <?php require("../footer.php") ?>
    <script src="/script.js"></script>
    <script src="/sweetalert2.all.min.js"></script>
</body>

</html>