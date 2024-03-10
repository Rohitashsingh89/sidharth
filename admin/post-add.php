<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
	<?php include_once 'header.php'; ?>
	<link rel="stylesheet" href="../css/richtext.min.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

	<?php
	$key = "hhdsfs1263z";
	include_once("data/Category.php");
	include_once("../db_conn.php");
	$categories = getAll($conn);

	?>

	<!-- End of Topbar -->

	<div class="container-fluid">

		<!-- Page Heading -->
		<h3 class="mb-3">Create New Post
			<a href="post.php" class="btn btn-secondary">Posts</a>
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
				<form class="shadow p-3" action="req/post-create.php" method="post" enctype="multipart/form-data">

					<div class="mb-3">
						<label class="form-label">Title</label>
						<input type="text" class="form-control" name="title">

					</div>

					<div class="mb-3">
						<label class="form-label">Cover Image</label>
						<input type="file" class="form-control" name="cover">
					</div>
					<div class="mb-3">
						<label class="form-label">Text</label>
						<textarea id="editor" class="form-control text" name="text"></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Category</label>
						<select name="category" class="form-control">
							<?php foreach ($categories as $category) { ?>
								<option value="<?= $category['id'] ?>">
									<?= $category['category'] ?></option>
							<?php } ?>
						</select>

					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>

	</div>


	<script>
		var navList = document.getElementById('navList').children;
		navList.item(1).classList.add("active");

		$(document).ready(function() {
			$('.text').richText();
		});
	</script>
	<script>
		// Initialize CKEditor
		ClassicEditor
			.create(document.querySelector('#editor'))
			.then(editor => {
				console.log(editor);
			})
			.catch(error => {
				console.error(error);
			});
	</script>

<?php
	include_once 'footer.php';
} else {
	header("Location: ../admin-login.php");
	exit;
} ?>