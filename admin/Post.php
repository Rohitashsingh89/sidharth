<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
	<?php include_once 'header.php'; ?>

	<?php
	$key = "hhdsfs1263z";
	include_once("data/Post.php");
	include_once("data/Comment.php");
	include_once("../db_conn.php");
	$posts = getAllDeep($conn);
	?>

	<!-- End of Topbar -->

	<div class="container-fluid">

		<!-- Page Heading -->
		<h3 class="mb-3">All Posts
			<a href="post-add.php" class="btn btn-success">Add New</a>
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

					<?php if ($posts != 0) { ?>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">Sn No.</th>
									<th>Title</th>
									<th>Category</th>
									<th>Comments</th>
									<th>Likes</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col">Sn No.</th>
									<th>Title</th>
									<th>Category</th>
									<th>Comments</th>
									<th>Likes</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($posts as $post) {
									$category = getCategoryById($conn, $post['category']);
								?>
									<tr>
										<th scope="row"><?= $post['post_id'] ?></th>
										<td><a href="single_post.php?post_id=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a></td>
										<td>
											<?= $category['category'] ?>
										</td>
										<td>
											<i class="fa fa-comment" aria-hidden="true"></i>

											<?php
											echo CountByPostID($conn, $post['post_id']);
											?>
										</td>
										<td>
											<i class="fa fa-thumbs-up" aria-hidden="true"></i>
											<?php
											echo likeCountByPostID($conn, $post['post_id']);
											?>
										</td>
										<td>
											<a href="post-delete.php?post_id=<?= $post['post_id'] ?>" class="btn btn-danger">Delete</a>
											<a href="post-edit.php?post_id=<?= $post['post_id'] ?>" class="btn btn-warning">Edit</a>
											<?php
											if ($post['publish'] == 1) {
											?>
												<a href="post-publish.php?post_id=<?= $post['post_id'] ?>&publish=1" class="btn btn-link disabled">Public</a>
												<a href="post-publish.php?post_id=<?= $post['post_id'] ?>&publish=0" class="btn btn-link ">Private</a>
											<?php } else { ?>
												<a href="post-publish.php?post_id=<?= $post['post_id'] ?>&publish=1" class="btn btn-link ">Public</a>
												<a href="post-publish.php?post_id=<?= $post['post_id'] ?>&publish=0" class="btn btn-link disabled">Privet</a>
											<?php } ?>
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