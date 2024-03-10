<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidharth Kumar - OnePage Portfolio HTML5 Template</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/line-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/smooth-scrollbar.css">
    <link rel="stylesheet" href="css/lightbox.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body class="home1-page">

    <?php
    // include 'inc/NavBar.php';
    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    $counter = 1;
    if (isset($_GET['search'])) {
        $key = $_GET['search'];
        $posts = serach($conn, $key);
        if ($posts == 0) {
            $notFound = 1;
        }
    } else {
        $posts = getAll($conn);
    }
    $categories = get5Categoies($conn);
    ?>


    <?php
    include 'inc/NavBar.php';
    ?>

    <section class="contact-area page-section scroll-content mt-5 pt-5" id="contact">
        <div class="custom-container">
            <div class="contact-content content-width">
                <div class="section-header">
                    <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                        <i class="las la-dollar-sign"></i> Dashboard
                    </h4>
                    <h1 class="scroll-animation" data-animation="fade_from_bottom">Welcome to
                        <span>Dashboard!</span>
                    </h1>
                </div>
                <a href="admin/post-add.php ?>"><button class="theme-btn">Add Post </button> </a>

                <div class="table">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card bg-transparent text-light">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div style="overflow-x: auto;">

                                                    <table class="table table-striped text-light">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Sn No..
                                                                </th>
                                                                <!-- <th>
                                                                    Author
                                                                </th> -->
                                                                <th>
                                                                    Title
                                                                </th>
                                                                <th>
                                                                    PostedOn
                                                                </th>
                                                                <th>
                                                                    Action
                                                                </th>
                                                            </tr>
                                                        </thead>


                                                        <?php if ($posts != 0) { ?>
                                                            <main class="main-blog">
                                                                <h1 class="display-4 mb-4 fs-3">
                                                                    <?php
                                                                    if (isset($_GET['search'])) {
                                                                        echo "Search <b>'" . htmlspecialchars($_GET['search']) . "'</b>";
                                                                    } ?></h1>
                                                                <tbody>
                                                                    <?php foreach ($posts as $post) { ?>


                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <?php echo $counter; ?>
                                                                            </td>
                                                                            <!-- <td>
                                                                                Rohitash
                                                                            </td> -->
                                                                            <td>
                                                                                <?php
                                                                                $p = strip_tags($post['post_title']);
                                                                                if (strlen($p) > 28) {
                                                                                    $p = substr($p, 0, 28) . '...';
                                                                                }
                                                                                ?>
                                                                                <a href="blog-view.php?post_id=<?= $post['post_id'] ?>"><?= $p ?></a>
                                                                            </td>
                                                                            <td>
                                                                                <?= $post['crated_at'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group">
                                                                                    <a href="admin/post-edit.php?post_id=<?= $post['post_id'] ?>"><button type="button" class="btn btn-outline-primary">Edit</button>
                                                                                    </a>
                                                                                    <a href="admin/post-delete.php?post_id=<?= $post['post_id'] ?>">
                                                                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                        $counter++;
                                                                        ?> <?php } ?>
                                                                </tbody>

                                                            </main>
                                                        <?php } else { ?>
                                                            <main class="main-blog p-2">
                                                                <?php if ($notFound) { ?>
                                                                    <div class="alert alert-warning">
                                                                        No search results found
                                                                        <?php echo " - <b>key = '" . htmlspecialchars($_GET['search']) . "'</b>" ?>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="alert alert-warning">
                                                                        No posts yet.
                                                                    </div>
                                                                <?php } ?>
                                                            </main>
                                                        <?php } ?>

                                                    </table>
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
    </div>
    </main>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/ScrollToPlugin.min.js"></script>
    <script src="js/lightbox.min.js"></script>

    <script src="js/main.js"></script>
    <!-- <script src="js/ajax-form.js"></script> -->
    <script src="js/color.js"></script>

</body>

</html>