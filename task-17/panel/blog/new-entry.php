<?php include "../../utils/CMS.php";
check_session();
if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel / Blog / New Post</title>
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../style.css">
</head>


<body>
    <?php require "../../header.php"; ?>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto text-dark">
                <h1 class="fw-bold mb-4 text-center">New Entry</h1>
                <form action="?" class="w-100 border p-5 d-flex flex-column align-items-center" method="POST">

                    <label for="image" class="fw-bold mb-1">Image File Name With Extension</label>
                    <input type="text" id="image" name="image" class="form-control mb-3" required>
                    <label for="category" class="fw-bold mb-1">Category</label>
                    <input type="text" id="category" name="category" class="form-control mb-3" required>
                    <label for="title" class="fw-bold mb-1">Title</label>
                    <input type="text" id="title" name="title" class="form-control mb-3" required>
                    <label for="content" class="fw-bold mb-1">Content</label>
                    <div class="my-2">
                    <button class="btn btn-primary" id="quote">Add Quote</button>
                    <button class="btn btn-primary" id="header">Add Header</button>
                    <button class="btn btn-primary" id="list">Add List</button>
                    <button class="btn btn-primary" id="img">Add Image</button>
                    </div>
                    <textarea type="text" id="content" name="content" class="form-control mb-3" rows="15" required></textarea>
                    <div class="my-4">
                        <input type="submit" value="Create" class="btn btn-primary px-5 py-2 text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require("../../footer.php") ?>
    <script src="script.js"></script>
</body>

</html>

<?php } else{
    include "../../utils/SQL.php";
    $image = $_POST['image'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION["uid"];
    try {
        $mysqli = get_connection();
    } catch (Exception $e) {
        echo "Failed to connect to database. Reason: " . $e;
        exit();
    }
    try{
        $beid = create_blog_entry($mysqli, $image, $category, $title, $content, $author);
        header("Location: /panel/blog/index.php");
        exit();
    }catch(Exception $e){
        echo "Failed to insert. Reason: " . $e;
    }
} ?>