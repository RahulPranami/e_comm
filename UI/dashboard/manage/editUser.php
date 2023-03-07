<?php
$prod = $ecomm->getUser();
// print_r($prod)
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
                            <form id="editUsr" method="post">
                                <input type="hidden" id="user" name="user" value="<?= $prod['id'] ?>" />

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?= $prod['name'] ?>" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Your Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="<?= $prod['email'] ?>" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="number">Your Number</label>
                                    <input type="tel" id="number" name="number" class="form-control form-control-lg" value="<?= $prod['contactNumber'] ?>" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="number">Your Address</label>
                                    <input type="text" id="address" name="address" class="form-control form-control-lg" value="<?= $prod['address'] ?>" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="submit" value="editUser" class="btn btn-block btn-lg gradient-custom-4 text-body" id="editUser" />
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
        $("#editUser").on("click", function(e) {
            // e.preventDefault();
            var dataString = $("#editUsr").serialize();
            console.log(dataString);
            $("#editUsr").validate({
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
                            if (res == 200) {
                                //   console.log("logged In");
                                alert("User Updated Successfully");
                            }
                        },
                    });
                }
            });
        });
    });
</script>