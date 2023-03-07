<!DOCTYPE html>
<html lang="en">
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// session_start();
require "config.php";
$ecomm = new ECOMM('localhost', 'root', 'root', 'php_ecommerce');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E commerce</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/5.15.4/css/font-awesome.css"> -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" /> -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <style>
        /* if using cart 2 then using this style other wise delete it */
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }

        .bg-grey {
            background-color: #eae8e8;
        }

        @media (min-width: 992px) {
            .card-registration-2 .bg-grey {
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        @media (max-width: 991px) {
            .card-registration-2 .bg-grey {
                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
            }
        }

        .error {
            color: red;
        }

        .w-10 {
            width: 200px;
        }

        .pagination li {
            background-color: #2e3440;
            margin: 0 2px;
            padding: 5px 5px;
            border-radius: 5px;
        }

        .pagination li:hover {
            background-color: #8fbcbb;
        }

        .pagination li a {
            color: #e5e9f0;
            padding: 5px 10px;
            text-decoration: none;
        }

        .pagination li a:hover {
            color: #2e3440;
        }

        thead,
        td {
            height: 60px;
        }

        .pagination .active {
            background-color: #81a1c1;
        }
    </style>
</head>


<body>
    <?php include "./UI/header.php" ?>
    <?php
    // include "./UI/product.php"
    ?>

    <?php
    if (isset($_GET['user'])) {
        if (!$ecomm->checklogin()) {
            if ($_GET['user'] == 'signup') {
                include_once "./UI/signup.php";
            } else {
                include_once "./UI/login.php";
            }
        } else {
            include_once "./UI/dashboard/home.php";
        }
    } else if (isset($_GET['dashboard'])) {

        include_once "./UI/dashboard/home.php";
        // }
    } else if (isset($_GET['cart'])) {
        // if ($ecomm->checklogin()) {
        include_once "./UI/cart2.php";
        // } else {
        // include_once "./UI/login.php";
        //  include_once "./UI/category/all.php";
        // }
        // }
    } else {
        if (isset($_GET['category'])) {
            if ($ecomm->checklogin()) {
                if ($_GET['category'] == 'all') {
                    include_once "./UI/category/all.php";
                } else if ($_GET['category'] == 'fashion') {
                    include_once "./UI/category/fashion.php";
                } else if ($_GET['category'] == 'electronic') {
                    include_once "./UI/category/electronic.php";
                } else if ($_GET['category'] == 'jewellery') {
                    include_once "./UI/category/jewellery.php";
                } else if ($_GET['category'] == 'test') {
                    include_once "./UI/category/test.php";
                }
            } else {
                include_once "./UI/login.php";
                //  include_once "./UI/category/all.php";
            }
        } else {
            // include_once "./UI/login.php";
            include_once "./UI/category/all.php";
        }
    }

    ?>

    <?php include "./UI/footer.php" ?>

    <!-- Javascript files-->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

    <script src="script.js"></script>
</body>

</html>