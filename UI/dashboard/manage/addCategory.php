<!-- signup section start -->
<div class="signup_section">
    <div class="mask d-flex align-items-center h-100 signup">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card gradient-custom-3" style="border-radius: 15px;">
                        <div class="card-body px-5">
                            <h2 class="text-uppercase text-center mb-3">Add a Category</h2>

                            <!-- <form> -->
                            <form id="addCat" method="post">
                                <input type="hidden" id="category" name="category" />

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="submit" value="addCategory" class="btn btn-block btn-lg gradient-custom-4 text-body" id="addCategory" />
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
        $("#addCategory").on("click", function(e) {
            // e.preventDefault();
            var dataString = $("#addCat").serialize();
            $("#addCat").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },
                },
                submitHandler: function() {
                    $.ajax({
                        url: "login.php",
                        // url: "addCat.php",
                        method: "POST",
                        data: dataString,
                        success: function(res) {
                            console.log(res);
                            if (res == 400) {
                                alert("Something Went Wrong!!");
                            }
                            if (res == 303) {
                                alert("category already Exists!!");
                                location.reload();
                            }
                            if (res == 201) {
                                //   console.log("logged In");
                                alert("category Added Successfully");
                            }
                        },
                    });
                }
            });
        });
    });
</script>