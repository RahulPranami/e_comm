<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$tbl = 'category';
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$result = $ecomm->pagination($pn, 5, $tbl);

if (isset($_GET['delete'])) {
    $ecomm->deleteData($_GET['delete'], $tbl);
}
?>
<section class="mr-4" style="background-color: #eee;">
    <div class="container py-3 my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-between mb-2">
                                <a href="?dashboard&addCat">
                                    <button type="button" class="btn btn-primary">Add Category</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <table class="table table-bordered table-sm table-hover table-light">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><button class="btn btn-sm btn-outline-success" onclick="editData('<?= $row['id'] ?>')">Edit</button></td>
                                            <td><button name="btnDel" class="btn btn-sm btn-outline-danger" onclick="deleteData('<?= $row['id'] ?>')">Delete</button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <ul class="pagination">
                                <?= $ecomm->pages($pn, 5, $tbl) ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>