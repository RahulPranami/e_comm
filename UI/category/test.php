<!-- electronic section start -->
<div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">Electronic</h1>
                    <div class="fashion_section_2">
                        <div class="row">

                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">Laptop</h4>
                                    <p class="price_text">Price <span style="color: #262626;">$ 100</span></p>
                                    <div class="electronic_img"><img src="images/laptop-img.png"></div>
                                    <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt" data-toggle="modal" data-target="#productModal" data-price="" data-img="" data-name=""><a href="#">See More</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">Man T -shirt</h4>
                                    <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                                    <div class="tshirt_img"><img src="images/tshirt-img.png"></div>
                                    <div class="btn_main">
                                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                                        <div class="seemore_bt" data-toggle="modal" data-target="#productModal"><a href="#">See More</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!-- electronic section end -->

<!-- Product Modal  -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-content" role="document">
        <!-- <div class="box_main modal-dialog modal-content" role="document"> -->
        <div class="modal-header">
            <h4 class="shirt_text modal-title" id="productName"><?= $_GET['item_name'] ?? "Laptop" ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="price_text">Price $ <span style="color: #262626;" id="productPrice"><?= $_GET['price'] ?? 100 ?></span></p>
            <div class="electronic_img"><img src="assets/<?= $_GET['img'] ?? 'laptop-img.png' ?>"></div>
        </div>
        <div class="modal-footer">
            <div class="btn_main">
                <div class="buy_bt"><a href="<?= $_GET['link'] ?? '#' ?>">Buy Now</a></div>
                <div class="seemore_bt"><a href="<?= $_GET['details'] ?? '#' ?>">See More</a></div>
            </div>
        </div>
    </div>
</div>