<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
	<?php include_once 'header.php'; ?>

	<?php
	$key = "hhdsfs1263z";
	include_once("data/Comment.php");
	include_once("data/Post.php");
	include_once("../db_conn.php");
	$comments = getAllComment($conn);

	?>

	<!-- End of Topbar -->

	<div class="container-fluid">

		<!-- Page Heading -->
		<h3 class="mb-3">All Comments</h3>
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

					<?php if ($comments != 0) { ?>
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">Sn No.</th>
									<th scope="col">Post Title</th>
									<th scope="col">Comment</th>
									<th scope="col">User</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col">Sn No.</th>
									<th scope="col">Post Title</th>
									<th scope="col">Comment</th>
									<th scope="col">User</th>
									<th scope="col">Action</th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach ($comments as $comment) {
								?>
									<tr>
										<th scope="row"><?= $comment['comment_id'] ?></th>
										<td>
											<a href="single_post.php?post_id=<?= $comment['post_id'] ?>">
												<?php
												$p = getByIdDeep($conn, $comment['post_id']);
												echo $p['post_title']; ?></a>
										</td>
										<td>
											<?= $comment['comment'] ?>
										</td>
										<td>
											<?php
											$u = getUserByID($conn, $comment['user_id']);
											echo '@' . $u['username']; ?>
										</td>
										<td>
											<a href="comment-delete.php?comment_id=<?= $comment['comment_id'] ?>" class="btn btn-danger">Delete</a>
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