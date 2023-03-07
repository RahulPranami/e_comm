<?php

print_r($_GET['id']);

?>

<!-- Product Modal  -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-content" role="document">
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

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-name="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="box_main modal-dialog modal-content" role="document">
        <div class="modal-header">
            <h4 class="shirt_text modal-title" id="exampleModalLabel"><?= $_GET['item_name'] ?? "Laptop" ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="price_text">Price <span style="color: #262626;">$ <?= $_GET['price'] ?? 100 ?></span></p>
            <div class="electronic_img"><img src="assets/<?= $_GET['img'] ?? 'laptop-img.png' ?>"></div>
        </div>
        <div class="modal-footer">
            <div class="btn_main">
                <div class="buy_bt"><a href="<?= $_GET['link'] ?? '#' ?>">Buy Now</a></div>
                <div class="seemore_bt"><a href="<?= $_GET['details'] ?? '#' ?>">See More</a></div>
            </div>
        </div>
    </div>
</div> -->