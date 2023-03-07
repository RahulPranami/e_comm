<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$tbl = 'user';

if (isset($_GET["page"])) {
    $pn  = $_GET["page"];
} else {
    $pn = 1;
};

$result = $ecomm->userPagination($pn, 5, $tbl);

if (isset($_GET['delete'])) {
    $ecomm->deleteData($_GET['delete'], $tbl);
}

?>
<section class="mr-4" style="background-color: #eee;">
    <div class="container py-3 my-4">
        <div class="row">
            <div class="w-100 px-5 text-center m-auto">
                <div class="card mb-4  w-100">
                    <div class="card-body w-100">
                        <table class="table table-bordered table-sm table-hover table-light">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tBody">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['contactNumber'] ?></td>
                                        <td><?= $row['address'] ?></td>
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
</section>

<script>
    function deleteData(data) {
        if (confirm("Do You really want to delete user") == true) {
            window.location.href = "?dashboard&customers&delete=" + data;
            console.log("You pressed OK!");
        } else {
            console.log("You canceled!");
            return;
        }
    }
</script>