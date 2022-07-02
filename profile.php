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
    <link rel="stylesheet" href="static/css/footer-style.css">
    <link rel="stylesheet" href="static/css/profile-style.css">
    <link rel="stylesheet" href="static/css/cropper.css">
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
                <li class="nav-item nav-home mt-1">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item nav-about">
                    <a href="#" class="nav-link">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item nav-logout">
                    <a href="#" class="nav-link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <!-- end navbar -->


    <!-- section profile -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-10 offset-1">

                <div class="card text-center">
                    <form action="" method="post">
                        <img src="static/images/favicon-apple.jpg" class="card-img-top background-card" alt="your-background-profile">
                        <label for="upload-image">
                            <img src="static/images/favicon-apple.jpg" class="card-img-top profile-card rounded-circle" alt="your-profile">
                            <input type="file" id="upload-image" name="upload-image" style="display: none;">
                        </label>
                        <div class="card-body text-center pt-2 pb-4">
                            <h5 class="card-title mb-1">Akbarazy</h5>
                            <p class="card-text">Hi, I am Akbarazy</p>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#setModal">Edit Bio</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="setModal" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModal">Edit Bio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end profile -->


    <!-- section footer -->

    <div class="bg-dark mt-5">
        <div class="container">
            <div class="row">

                <div class="col-6 padding-footer text-white mt-4">
                    <h5 class="footer-subtitle">Ability</h5>
                    <p class="m-0 padding-right">CSS</p>
                    <p class="m-0 padding-right">JS</p>
                    <p class="m-0 padding-right">PHP</p>
                </div>
                <div class="col-6 padding-footer text-white mt-4 mb-4">
                    <h5 class="footer-subtitle">Purpose</h5>
                    <p class="m-0 padding-right">Learning</p>
                    <p class="m-0 padding-right">Experience</p>
                    <p class="m-0 padding-right">Trying</p>
                </div>

                <div class="col-10 offset-1 text-center text-copyright copyright border-copyright">
                    <p>&copy; Copyright | By Akbarazy</p>
                    <p class="mb-3">Design By Akbarazy 2022</p>
                </div>
            </div>
        </div>
    </div>

    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="static/js/navbar-script.js"></script>
    <script src="static/js/cropper.js"></script>
</body>

</html>