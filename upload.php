<?php
require_once 'functions.php';

$name = $_COOKIE['name'];
$yourProfile = query("SELECT * FROM userprofile WHERE name = '$name'")[0];

if (isset($_POST['image'])) {
    $data = $_POST['image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);

    $image_name = time() . '.png';
    file_put_contents('images/' . $image_name, $data);
    editImage($yourProfile['id'], $image_name);

    echo 'images/' . $image_name;
}
