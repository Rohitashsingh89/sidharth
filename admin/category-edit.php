<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && $_GET['id']) {
?>
	<?php include_once 'header.php'; ?>

	<?php
	$key = "hhdsfs1263z";
	$id = $_GET['id'];
	include_once("data/Category.php");
	include_once("../db_conn.php");
	$categoryx = getById($conn, $id);

	if (isset($_GET['category'])) {
		$category = $_GET['category'];
	} else {
		$category = $categoryx['category'];
		$category_id = $categoryx['id'];
	}

	?>


	<!-- End of Topbar -->

	<div class="container-fluid">

		<!-- Page Heading -->
		<h3 class="mb-3">Edit
			<a href="Category.php" class="btn btn-success">Category</a>
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
				<form class="shadow p-3" action="req/Category-edit.php" method="post">

					<div class="mb-3">
						<label class="form-label">Category</label>
						<input type="text" class="form-control" name="category" value="<?= $category ?>">
						<input type="text" class="form-control" name="id" value="<?= $category_id ?>" hidden>
					</div>

					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>

<?php
	include_once 'footer.php';
} else {
	header("Location: ../admin-login.php");
	exit;
} ?>