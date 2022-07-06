<?php
$connect = mysqli_connect('localhost', 'root', '', 'profile');

function query($query)
{
    global $connect;

    $result = mysqli_query($connect, $query);
    $yourProfile = [];
    while ($yourProfileRow = mysqli_fetch_assoc($result)) {
        $yourProfile[] = $yourProfileRow;
    }
    return $yourProfile;
}

function editBio()
{
    global $connect;

    if (isset($_POST['submit-bio'])) {
        $bio = $_POST['bio'];
        $id = $_POST['id'];

        $query = "UPDATE userprofile SET
            bio = '$bio'
        WHERE id = $id";
        mysqli_query($connect, $query);
        return;
    }
}

function editImage($id, $image)
{
    global $connect;

    if ($image !== null) {
        $query = "UPDATE userprofile SET
            image = '$image'
        WHERE id = $id";
        mysqli_query($connect, $query);
        return;
    }
}

function regist()
{
    global $connect;

    if (isset($_POST['submit'])) {
        $name = stripslashes($_POST['name']);
        $name = strval($name);
        $bio = "Hi, I am $name";
        $image = 'user.png';

        $result = mysqli_query($connect, "SELECT name FROM userprofile WHERE name = '$name'");

        if (mysqli_num_rows($result) === 0) {
            setcookie('login', true, time() + 999999999);

            mysqli_query($connect, "INSERT INTO userprofile VALUES (
                '', '$name', '$bio', '$image'
            )");

            setcookie('name', $name, time() + 999999999);
            return '';
        } else if (mysqli_num_rows($result) > 0) {

            return '<div class="alert alert-danger" role="alert">
                Your name has been used.
            </div>';
        }
    }
}
