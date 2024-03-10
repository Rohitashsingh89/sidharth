<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
$notFound = 0;


if (isset($_GET['post_id'])) {

    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);
    $categories = get5Categoies($conn);

    if ($post == 0) {
        header("Location: blog.php");
        exit;
    }
?>


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
        include 'inc/NavBar.php';
        ?>

        <section class="portfolio-area page-section scroll-to-page" id="portfolio">
            <div class="custom-container">
                <div class="portfolio-content content-width">
                    <div class="section-header">
                        <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                            <i class="las la-grip-vertical"></i> blog
                        </h4>
                    </div>

                    <div class="row portfolio-items">
                        <img src="upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="...">
                        <h5 class="card-title mt-4"><?= $post['post_title'] ?></h5>
                        <p class="card-text"><?= $post['post_text'] ?></p>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="react-btns">
                                <?php
                                $post_id = $post['post_id'];
                                if ($logged) {
                                    $liked = isLikedByUserID($conn, $post_id, $user_id);


                                    if ($liked) {
                                ?>
                                        <i class="fa fa-thumbs-up liked like-btn" post-id="<?= $post_id ?>" liked="1" aria-hidden="true"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-thumbs-up like like-btn" post-id="<?= $post_id ?>" liked="0" aria-hidden="true"></i>
                                    <?php }
                                } else { ?>
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <?php } ?>
                                Likes (
                                <span><?php
                                        echo likeCountByPostID($conn, $post['post_id']);
                                        ?></span> )
                                <i class="fa fa-comment" aria-hidden="true"></i> comments (
                                <?php
                                echo CountByPostID($conn, $post['post_id']);
                                ?>
                                )

                            </div>
                            <small class="text-body-secondary"><?= $post['crated_at'] ?></small>
                        </div>


                        <form action="php/comment.php" method="post" id="comments">

                            <h5 class="mt-4 text-secondary">Add comment</h5>
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($_GET['error']); ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo htmlspecialchars($_GET['success']); ?>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="comment">
                                <input type="text" class="form-control" name="post_id" value="<?= $id ?>" hidden>
                            </div>
                            <button type="submit" class="theme-btn mb-4">Comment</button>
                        </form>
                        <hr>
                        <div>
                            <div class="comments">
                                <?php if ($comments != 0) {
                                    foreach ($comments as $comment) {
                                        $u = getUserByID($conn, $comment['user_id']);
                                ?>
                                        <div class="comment d-flex">
                                            <div>
                                                <img src="img/user-default.png" width="40" height="40">
                                            </div>
                                            <div class="p-2">
                                                <span>@<?= $u['username'] ?></span>
                                                <p><?= $comment['comment'] ?></p>
                                                <small class="text-body-secondary"><?= $comment['crated_at'] ?></small>
                                            </div>
                                        </div>
                                        <hr>
                                <?php }
                                } ?>
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
        <script src="js/ajax-form.js"></script>
        <script src="js/color.js"></script>

    </body>

    </html>


<?php } else {
    header("Location: blog.php");
    exit;
} ?>