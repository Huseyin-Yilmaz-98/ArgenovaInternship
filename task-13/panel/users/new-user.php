<?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel / Users/ New User</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>


<body>
    <?php require "../header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto text-white">
                <h1 class="fw-bold mb-4 text-center">New User</h1>
                <form action="?" class="w-100 border p-5 d-flex flex-column align-items-center" method="POST">

                    <label for="username" class="fw-bold mb-1">Username</label>
                    <input type="text" id="username" name="username" class="form-control mb-3" required>
                    <label for="password-login" class="fw-bold mb-1">Password</label>
                    <input type="text" id="password" name="password" class="form-control mb-3" required>
                    <div class="my-4">
                        <input type="submit" value="Create" class="btn btn-primary px-5 py-2 text-white">
                    </div>
                    <?php if (isset($_GET["err"]) && $_GET["err"] == 1) { ?>
                        <p class="text-white fw-bold fs-5">This username already exists!</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php } else{
    include "../../utils/SQL.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $mysqli = get_connection();
    } catch (Exception $e) {
        echo "Failed to connect to database. Reason: " . $e;
        exit();
    }

    try{
        $uid = create_user($mysqli, $username, $password);
        if(!$uid){
            header("Location: ?err=1");
        } else{
            header("Location: /panel/users/index.php");
        }
        exit();
    }catch(Exception $e){
        echo "Failed to insert. Reason: " . $e;
    }
} ?>