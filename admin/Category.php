<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
    <?php include_once 'header.php'; ?>

    <?php
    $key = "hhdsfs1263z";
    include_once("data/Category.php");
    include_once("../db_conn.php");
    $categories = getAll($conn);

    ?>

    <!-- End of Topbar -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h3 class="mb-3">All Categories
            <a href="Category-add.php" class="btn btn-success">Add New</a>
        </h3>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-warning">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_GET['success']) ?>
            </div>
        <?php } ?>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <?php if ($categories != 0) { ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No.</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">Sn No.</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($categories as $category) { ?>
                                    <tr>
                                        <th scope="row"><?= $category['id'] ?></th>
                                        <td><?= $category['category'] ?></td>
                                        <td>
                                            <a href="category-delete.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a>
                                            <a href="category-edit.php?id=<?= $category['id'] ?>" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-warning">
                            Empty!
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>

<?php
    include_once 'footer.php';
} else {
    header("Location: ../admin-login.php");
    exit;
} ?>