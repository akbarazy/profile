<?php
require_once 'functions.php';

if (!isset($_COOKIE['login'])) {
    header('location: register.php');
    exit;
}

$resultAlert = editBio();
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
    <link rel="stylesheet" href="static/css/profile-style.css">
    <link rel="stylesheet" href="static/css/cropper.css">
    <link rel="stylesheet" href="static/css/crop-style.css">
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
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item nav-logout">
                    <a href="profile.php?logout=true" class="nav-link">
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

                <div class="card text-center" style="border-radius: 5px;">
                    <img src="images/background-user.jpg" class="card-img-top background-card" alt="your-background-profile">
                    <label for="upload-image" id="profile-image" style="width: 100px; margin: auto;">
                        <img src="images/<?php echo $yourProfile['image']; ?>" class="card-img-top profile-card rounded-circle" alt="your-profile" id="image-profile">
                    </label>
                    <input type="file" id="upload-image" name="upload-image" style="display: none;">
                    <div class="card-body text-center pt-2 pb-4">
                        <h5 class="card-title mb-1"><?php echo $yourProfile['name']; ?></h5>
                        <p class="card-text"><?php echo $yourProfile['bio']; ?></p>
                        <button type="button" class="btn btn-outline-primary" id="edit-bio" data-toggle="modal" data-target="#modal-bio">Edit Bio</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cropper" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModal">Change Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="row">
                            <div class="col-10 col-sm-7 container-cropper" id="container-cropper">
                                <img src="" alt="your-profile" id="image-cropper">
                            </div>
                            <div class="col-4 col-sm-4 container-preview" id="container-preview">
                                <div class="preview" id="preview" style="border-radius: 50%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit-crop" id="submit-crop">Change Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-bio" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModal">Edit Bio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="input-group username">
                            <div class="input-group-prepend">
                                <div class="input-group-text icon-username">
                                    <label for="bio" style="height: 0px;">
                                        <i class="fa fa-info-circle" aria-hidden="true" style="vertical-align: top; margin-top: -3.05px;"></i>
                                    </label>
                                </div>
                            </div>
                            <input type="text" name="bio" class="form-control" id="bio" placeholder="Enter your bio" value="<?php echo $yourProfile['bio']; ?>" maxlength="30" autocomplete="off" autofocus required>
                            <input type="hidden" name='id' value='<?php echo $yourProfile['id']; ?>'>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit-bio" id="submit-bio">Edit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end profile -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="static/js/navbar-script.js"></script>
    <script src="static/js/cropper.js"></script>
    <script>
        $(document).ready(function() {
            const labelProfileImage = $("#profile-image");
            const inputUploadImage = $("#upload-image");

            let modal = $("#modal-cropper");
            let imageCropper = document.querySelector("#image-cropper");
            let cropper;

            inputUploadImage.on("change", function(event) {
                let files = event.target.files;

                if (files && files.length > 0) {
                    reader = new FileReader();
                    reader.onload = function(innerEvent) {
                        imageCropper.src = innerEvent.target.result;
                        modal.modal("show");
                    }
                    reader.readAsDataURL(files[0]);
                }
            });

            modal.on('shown.bs.modal', function() {
                cropper = new Cropper(imageCropper, {
                    aspectRatio: 1,
                    viewMode: 2,
                    preview: ".preview",

                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $("#submit-crop").on("click", function(event) {
                event.preventDefault();
                canvas = cropper.getCroppedCanvas({
                    width: 400,
                    height: 400
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    let reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        let base64data = reader.result;

                        $.ajax({
                            url: "upload.php",
                            method: "POST",
                            data: {
                                image: base64data
                            },
                            success: function(data) {
                                console.log(data);
                                modal.modal("hide");
                                $("#image-profile").attr("src", data);
                            }
                        });
                    }
                })
            });
        });
    </script>
</body>

</html>