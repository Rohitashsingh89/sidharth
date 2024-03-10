<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Dashboard - Users</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/old-side-bar.css">
        <link rel="stylesheet" href="../css/old-style.css">
        <style>
            /* Hide horizontal scrollbar */
            body {
                overflow-x: hidden;
            }
        </style>
    </head>

    <body>
        <?php
        $key = "hhdsfs1263z";
        include "inc/side-nav.php";
        include_once("data/User.php");
        include_once("../db_conn.php");
        $users = getAll($conn);

        ?>

        <section class="contact-area page-section scroll-content mt-5 pt-5" id="contact">
            <div class="custom-container">
                <div class="contact-content content-width">
                    <div class="table">
                        <h3 class="mb-3">All Users
                            <a href="../signup.php" class="btn btn-success">Add New</a>
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

                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-transparent text-light">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <div style="overflow-x: auto;">


                                                        <?php if ($users != 0) { ?>
                                                            <table class="table table-striped text-light">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Full Name</th>
                                                                        <th scope="col">username</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($users as $user) { ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $user['id'] ?></th>
                                                                            <td><?= $user['fname'] ?></td>
                                                                            <td><?= $user['username'] ?></td>
                                                                            <td>
                                                                                <a href="user-delete.php?user_id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        </div>
        </section>


        <script>
            var navList = document.getElementById('navList').children;
            navList.item(0).classList.add("active");
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

    </html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>