<!-- signup section start -->
<div class="signup_section">
    <div class="mask d-flex align-items-center h-100 signup">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card gradient-custom-3" style="border-radius: 15px;">
                        <div class="card-body px-5">
                            <h2 class="text-uppercase text-center mb-3">Create an account</h2>

                            <!-- <form> -->
                            <form id="Form" method="post">
                                <input type="hidden" id="user" name="user" value="register" />

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="email">Your Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="number">Your Number</label>
                                    <input type="tel" id="number" name="number" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="number">Your Address</label>
                                    <input type="text" id="address" name="address" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="cpassword">Repeat your password</label>
                                    <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="submit" value="Register" class="btn btn-block btn-lg gradient-custom-4 text-body" id="submit" />
                                    <!-- <input type="submit" name="login" value="Register" class="btn btn-block btn-lg gradient-custom-4 text-body" id="submit" /> -->
                                </div>

                                <p class="text-center text-muted mb-1">Have already an account? <a href="?user=login" class="fw-bold text-body"><u>Login here</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- signup section end -->