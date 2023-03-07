<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "./config.php";

$ecomm = new ECOMM('localhost', 'root', 'root', 'php_ecommerce');

if (isset($_POST['user'])) {
    if ($_POST['user'] == 'login') {
        $ecomm->login($_POST['email'], $_POST['password']);
    } else if ($_POST['user'] == 'register') {
        $ecomm->register($_POST['name'], $_POST['email'], $_POST['number'], $_POST['address'], $_POST['password']);
    } else if ($_POST['user']) {
        $ecomm->editUser($_POST['user'], $_POST['name'], $_POST['email'], $_POST['number'], $_POST['address']);
    }
}

if (isset($_POST['category'])) {
    $ecomm->addCategory($_POST['name']);
}

if (isset($_POST['product'])) {
    print_r($_POST);
    if ($_POST['product']) {

        // $ecomm->editProduct($_POST['product'], $_POST['name'], $_POST['image'], $_POST['categoryId'], $_POST['description'], $_POST['price']);
    } else {
        $ecomm->addProduct($_POST['name'], $_POST['categoryId'], $_POST['description'], $_POST['price']);
    }
}

// if (isset($_FILES['file']['name'])) {

//     /* Getting file name */
//     $filename = $_FILES['file']['name'];

//     /* Location */
//     $location = "upload/" . $filename;
//     $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
//     $imageFileType = strtolower($imageFileType);

//     /* Valid extensions */
//     $valid_extensions = array("jpg", "jpeg", "png");

//     $response = 0;
//     /* Check file extension */
//     if (in_array(strtolower($imageFileType), $valid_extensions)) {
//         /* Upload file */
//         if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
//             $response = $location;
//         }
//     }

//     echo $response;
//     exit;
// }

// echo 0;