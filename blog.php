<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	$logged = true;
	$user_id = $_SESSION['user_id'];
}
$notFound = 0;
?>

<?php include 'header.php'; ?>

<?php
// include 'inc/NavBar.php';
include_once("admin/data/Post.php");
include_once("admin/data/Comment.php");
include_once("db_conn.php");
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

<section class="portfolio-area page-section scroll-to-page" id="portfolio">
	<div class="custom-container">
		<div class="portfolio-content content-width">
			<div class="section-header">
				<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
					<i class="las la-grip-vertical"></i> blogs
				</h4>
				<h1 class="scroll-animation" data-animation="fade_from_bottom">Recent
					<span>Blogs</span>
				</h1>
			</div>

			<div class="row portfolio-items">


				<?php if ($posts != 0) { ?>
					<main class="main-blog">
						<h1 class="display-4 mb-4 fs-3">
							<?php
							if (isset($_GET['search'])) {
								echo "Search <b>'" . htmlspecialchars($_GET['search']) . "'</b>";
							} ?></h1>
						<?php foreach ($posts as $post) { ?>
							<div class="col-md-12 scroll-animation" data-animation="fade_from_bottom">
								<div class="portfolio-item portfolio-full">
									<div class="portfolio-item-inner">
										<a href="blog-view.php?post_id=<?= $post['post_id'] ?>">
											<img src="upload/blog/<?= $post['cover_url'] ?>" alt="Portfolio">
										</a>

										<ul class="portfolio-categories">
											<li>
												<a href="blog-view.php?post_id=<?= $post['post_id'] ?>">Figma</a>
											</li>
											<li>
												<a href="blog-view.php?post_id=<?= $post['post_id'] ?>">Framer</a>
											</li>
											<li>
												<a href="blog-view.php?post_id=<?= $post['post_id'] ?>">WordPress</a>
											</li>
										</ul>
									</div>
									<h2><a href="blog-view.php?post_id=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a></h2>
									<!-- <?php
											$p = strip_tags($post['post_text']);
											$p = substr($p, 0, 200);
											?>
													<p class="card-text"><?= $p ?>...</p> -->
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
											<a href="blog-view.php?post_id=<?= $post['post_id'] ?>#comments">
												<i class="fa fa-comment" aria-hidden="true"></i> Comments (
												<?php
												echo CountByPostID($conn, $post['post_id']);
												?>
												)
											</a>
										</div>
										<small class="text-body-secondary"><?= $post['crated_at'] ?></small>
									</div>

								</div>
							</div>

						<?php } ?>
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
								No Blog Post found!!.
							</div>
						<?php } ?>
					</main>
				<?php } ?>


			</div>

		</div>
	</div>
</section>
<?php include 'footer.php'; ?>