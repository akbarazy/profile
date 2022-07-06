<?php
require_once 'functions.php';

if (!isset($_COOKIE['login'])) {
    header('location: register.php');
    exit;
}

$name = $_COOKIE['name'];
$yourProfile = query("SELECT * FROM userprofile WHERE name = '$name'")[0];

if (isset($_GET['logout'])) {
    $id = $yourProfile['id'];
    setcookie('login', '', time() - 3600);
    setcookie('name', '', time() - 3600);
    mysqli_query($connect, "DELETE FROM userprofile WHERE id = $id");

    header('location: register.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akbarazy | Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/css/sidebar-style.css">
    <link rel="stylesheet" href="static/css/header-style.css">
</head>

<body>
    <!-- section navbar -->

    <div class="navbar-button navbar-fixed" id="navbar-button">
        <button class="navbar-toggler" type="button">
            <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-view" id="navbar-view">
        <div class="sidebar">

            <ul class="navbar-nav">
                <li class="nav-item nav-profile mb-1">
                    <a href="profile.php" class="nav-link text-center image-profile rounded-circle">
                        <img src="images/<?php echo $yourProfile['image']; ?>" alt="your-profile" width="70" class="rounded-circle">
                    </a>
                    <div class="bio-profile pb-2 text-center text-white" style="word-wrap: break-word;">
                        <?php echo $yourProfile['name']; ?>
                    </div>
                </li>

                <li class="nav-item nav-home mt-1">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item nav-about">
                    <a href="#" class="nav-link">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item nav-logout">
                    <a href="index.php?logout=true" class="nav-link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <!-- end navbar -->


    <!-- section header -->

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-9 border-radius blue-shadow text-center mt-5 p-3" style="word-wrap: break-word;">
                <h2>Welcome To My Website, <?php echo $yourProfile['name']; ?></h2>
                <p class="lead">This is a simple website for your profile test.</p>
            </div>

        </div>
    </div>

    <!-- end header -->


    <!-- section content -->

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-9 border-radius black-shadow text-center mt-5 p-3 bg-primary text-white">
                <h2>Visit my other website</h2>
                <p class="lead">You can enjoy all the websites made by me.</p>
            </div>

        </div>
    </div>

    <!-- end content -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="static/js/navbar-script.js"></script>
</body>

</html>