<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <?php require("header.php") ?>
    <div class="breadcrumbs d-flex flex-column justify-content-center align-items-center w-100">
        <h1 class="text-white">Contact</h1>
        <div class="d-flex flex-row">
            <a class="text-white mx-2" style="text-decoration: none;">Home</a>
            <p class="text-white mx-2">/</p>
            <p class="text-white mx-2">Contact</p>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row w-75 mx-auto py-3">
            <div
                class="d-flex flex-column col-lg-3 col-md-9 bg-primary container p-5 my-5 contact-info-container text-white">
                <p>LET'S TALK</p>
                <h2>Speak With Expert Engineers.</h2>
                <div class="my-3 d-flex">
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <p class="fa fa-envelope text-white m-0" style="font-size: 2em;"></p>
                    </div>

                    <div style="margin-left: 10px;">
                        <h5 class="m-0">Email:</h5>
                        <p class="m-0">example@example.com</p>
                    </div>
                </div>
                <div class="my-3 d-flex">
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <p class="fa fa-phone text-white m-0" style="font-size: 2em;"></p>
                    </div>

                    <div style="margin-left: 10px;">
                        <h5 class="m-0">Phone:</h5>
                        <p class="m-0">0(000)-000-0000</p>
                    </div>
                </div>
                <div class="my-3 d-flex">
                    <div class="h-100 d-flex justify-content-center align-items-center">
                        <p class="fa fa-map-marker text-white m-0" style="font-size: 2em;"></p>
                    </div>

                    <div style="margin-left: 10px;">
                        <h5 class="m-0">Address:</h5>
                        <p class="m-0">Kocaeli, Turkey</p>
                    </div>
                </div>

            </div>
            <form class="col-lg-8 col-md-12 px-5 container my-5" id="contact-form">
                <p class="text-primary">GET IN TOUCH</p>
                <h1 class="">Fill In The Form Below</h1>
                <div class="row">
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container">
                        <input class="w-100 h-100 form-control bg-light" name="name" id="name" type="text" placeholder="Name" id="name"
                            name="name" />
                    </div>
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container">
                        <input class="w-100 h-100 form-control bg-light" name="enail" id="email" type="email" placeholder="Email" id="email"
                            name="email" />
                    </div>
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container">
                        <input class="w-100 h-100 form-control bg-light" name="password" id="password" type="password" placeholder="Password"
                            id="password" name="password" />
                    </div>
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container">
                        <input class="w-100 h-100 form-control bg-light" name="phone" id="phone" type="tel" placeholder="Phone Number"
                            id="phone" name="phone" />
                    </div>
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container">
                        <select class="w-100 h-100 form-control bg-light" name="gender" id="gender">
                            <option value="" disabled selected hidden>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="p-2 col-lg-6 col-md-9 col-sm-11 input-container tall">
                        <textarea class="w-100 h-100 form-control bg-light" placeholder="Your Message"></textarea>
                    </div>
                    <p id="contact-form-successful" class="hidden w-100 my-4 text-center">Form submitted successfully!</p>
                    <p id="contact-form-failed" class="hidden w-100 my-4 text-center">Please check the red fields.</p>
                    <input class="btn mt-4 col-lg-3 col-md-4 col-sm-5 mx-auto button text-white" type="submit"
                        value="Submit">
                </div>
            </form>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58417.22536604188!2d90.422699!3d23.780287!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe26372e73a6832e7!2sRSTheme!5e0!3m2!1sen!2sus!4v1623837299459!5m2!1sen!2sus" height="550" class="w-100 m-0 p-0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <?php require("footer.php") ?>
    <script src="script.js"></script>
    <script src="contact.js"></script>
    <script src="sweetalert2.all.min.js"></script>
</body>

</html>