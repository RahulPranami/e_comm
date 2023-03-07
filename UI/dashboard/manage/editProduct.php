<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$prod = $ecomm->getProd($_GET['editProd']);
// print_r($prod);
?>
<!-- signup section start -->
<div class="signup_section">
    <div class="mask d-flex align-items-center h-100 signup">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card gradient-custom-3" style="border-radius: 15px;">
                        <div class="card-body px-5">
                            <h2 class="text-uppercase text-center mb-3">Edit a Product</h2>

                            <!-- <form> -->
                            <form id="editProd" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="product" name="product" value="<?= $prod['id'] ?>" />

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Product Name</label>
                                    <input type="text" id="name" name="name" value="<?= $prod['name'] ?>" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="categoryId">Product Category</label>
                                    <?php $result = $ecomm->getCategorys(); ?>
                                    <select name="categoryId" id="categoryId" class="form-control form-control-lg">
                                        <option value="">Not Selected</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $prod['categoryId'] ? "selected" : 0 ?>><?= $row['name'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="image">Image</label>
                                    <!-- <br /> -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="file" class="form-control w-50" name="image" id="image" placeholder="Your Image" />
                                        <img id="img" src="<?= $row['image'] ?>" alt="Not Available  ">
                                    </div>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="desc">Product Description</label>
                                    <input type="text" id="desc" name="description" value="<?= $prod['description'] ?>" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Product Price</label>
                                    <input type="text" id="price" name="price" value="<?= $prod['price'] ?>" class="form-control form-control-lg" />
                                </div>


                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="submit" value="editProduct" class="btn btn-block btn-lg gradient-custom-4 text-body" id="editProduct" />
                                    <!-- <input type="submit" name="login" value="Register" class="btn btn-block btn-lg gradient-custom-4 text-body" id="submit" /> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- signup section end -->
<script>
    $(document).ready(() => {
        $("#editProduct").on("click", function(e) {
            e.preventDefault();
            // var dataString = $("#editProd").serialize();
            let dataString = new FormData();

            dataString.append("product", $("#product").val());
            dataString.append("name", $("#name").val());
            dataString.append("categoryId", $("#categoryId").val());
            dataString.append("description", $("#desc").val());
            dataString.append("price", $("#price").val());

            var files = $('#image')[0].files;

            if (files.length > 0) {
                dataString.append('image', files[0]);
            }
            // console.log(files[0].name);
            // console.log(files)
            console.log(dataString)
            // console.log();
            // $fname = $_POST['FirstName'];
            // $lname = $_POST['LastName'];
            // $email = $_POST['Email'];
            // $number = $_POST['PhoneNumber'];
            // $img = $_FILES['image']['name'];
            // $bdate = $_POST['birthdate'];
            // $gender = $_POST['gender'];
            // $passwd = $_POST['Password'];
            // $tmp_name = $_FILES['image']['tmp_name'];

            $("#editProd").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },
                    categoryId: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                },
                submitHandler: function() {
                    $.ajax({
                        url: "login.php",
                        method: "POST",
                        data: dataString,
                        success: function(res) {
                            console.log(res);
                            if (res == 400) {
                                alert("Something Went Wrong!!");
                            }
                            if (res == 201) {
                                //   console.log("logged In");
                                alert("Product Updated Successfully");
                            }
                        },
                    });
                }
            });
        });
    });
</script>