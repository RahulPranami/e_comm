<!-- signup section start -->
<div class="signup_section">
    <div class="mask d-flex align-items-center h-100 signup">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card gradient-custom-3" style="border-radius: 15px;">
                        <div class="card-body px-5">
                            <h2 class="text-uppercase text-center mb-3">Add a Product</h2>

                            <!-- <form> -->
                            <form id="addProd" method="post">
                                <input type="hidden" id="product" name="product" />

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="categoryId">Product Category</label>
                                    <?php $result = $ecomm->getCategorys(); ?>
                                    <select name="categoryId" id="categoryId" class="form-control form-control-lg">
                                        <option value="">Not Selected</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="desc">Product Description</label>
                                    <input type="text" id="description" name="description" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="price">Product Price</label>
                                    <input type="text" id="price" name="price" class="form-control form-control-lg" />
                                </div>


                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="submit" value="addProduct" class="btn btn-block btn-lg gradient-custom-4 text-body" id="addProduct" />
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
        $("#addProduct").on("click", function(e) {
            // e.preventDefault();
            var dataString = $("#addProd").serialize();
            console.log(dataString);
            $("#addProd").validate({
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
                                alert("Product Added Successfully");
                            }
                        },
                    });
                }
            });
        });
    });
</script>