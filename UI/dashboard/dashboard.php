<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$user = $ecomm->getUser();
?>
<section class="mr-4" style="background-color: #eee;">
    <!-- <section class="" style="background-color: #eee;"> -->
    <!-- <div class="container py-5 mt-4"> -->
    <!-- <div class="container py-5 mt-4"> -->
    <div class="container py-3 my-4">
        <!-- <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div> -->

        <div class="row">

            <!-- <div class="col-lg-8"> -->
            <div class="w-75 text-center m-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['name'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['contactNumber'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['address'] ?></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="d-flex justify-content-start mx-4 mb-3">
                        <a href="?dashboard&editUser">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>