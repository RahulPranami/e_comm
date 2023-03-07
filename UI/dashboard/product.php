<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$tbl = 'product';
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
    // print_r($_GET);
} else {
    $pn = 1;
};

$result = $ecomm->getProductsPagination($pn, 100);

if (isset($_GET['delete'])) {
    $ecomm->deleteData($_GET['delete'], $tbl);
}
?>
<section class="mr-4" style="background-color: #eee;">
    <div class="container py-3 my-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <ol class="breadcrumb m-0 text-dark">
                            <li class="breadcrumb-item" aria-current="page">Manage Products</li>
                        </ol>
                        <a href="?dashboard&addProd" class="breadcrumb m-0">
                            <button type=" button" class="btn btn-primary">Add Product</button>
                        </a>
                    </div>
                </nav>
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
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['cName'] ?></td>
                                            <td> <img style="width: 50px; height: 50px;" src="<?php echo $row['image']; ?>" alt="Not Found"> </td>
                                            <td><?= $row['description'] ?></td>
                                            <td><?= $row['price'] ?></td>
                                            <td><a href="?dashboard&editProd=<?= $row['id'] ?>"> <button class="btn btn-sm btn-outline-success">Edit</button> </a> </td>
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

<script>
    function deleteData(data) {
        if (confirm("Do You really want to delete user") == true) {
            window.location.href = "?dashboard&product&delete=" + data;
            console.log("You pressed OK!");
        } else {
            console.log("You canceled!");
            return;
        }
    }
</script>