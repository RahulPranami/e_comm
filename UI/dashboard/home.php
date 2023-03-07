<?php if ($ecomm->checklogin()) :   ?>



    <div class="clearfix">
        <div class="position-sticky w-25 pl-5 py-5 h-100 float-left">
            <!-- <div class="position-sticky w-25 pl-2 py-5 h-100 float-left"> -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?dashboard&home">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&orders">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span class="ml-2">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-2">Cart</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&product">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-2">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&category">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-2">Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&customers">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-2">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?dashboard&logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-2">Log out</span>
                    </a>
                </li>

            </ul>

        </div>
        <div class="float-right w-75 h-100">
            <?php
            if (isset($_GET['orders'])) {
                // include_once "cart.php";
                echo "Hello From Orders";
            } else if (isset($_GET['home'])) {
                include_once "dashboard.php";
            } else if (isset($_GET['category'])) {
                include_once "category.php";
            } else if (isset($_GET['product'])) {
                include_once "product.php";
            } else if (isset($_GET['cart'])) {
                // include_once "dashboard.php";
                include_once "cart.php";
            } else if (isset($_GET['customers'])) {
                include_once "users.php";
                // echo "Hello From Customers";
            } else if (isset($_GET['logout'])) {
                $ecomm->logout();
            } else if (isset($_GET['addCat'])) {
                include_once "manage/addCategory.php";
            } else if (isset($_GET['addProd'])) {
                include_once "manage/addProduct.php";
            } else if (isset($_GET['editProd'])) {
                include_once "manage/editProduct.php";
            } else if (isset($_GET['editUser'])) {
                // echo "ADd";
                include_once "manage/editUser.php";
            } else {
                // include_once "dashboard.php";
            }

            ?>
        </div>
    </div>
<?php else : ?>
    <?php include_once "./UI/login.php"; ?>
<?php endif ?>