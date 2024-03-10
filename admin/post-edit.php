<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
?>
	<?php include_once 'header.php'; ?>
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

	<?php
	$key = "hhdsfs1263z";
	include_once("data/Post.php");
	include_once("../db_conn.php");
	$post_id =  $_GET['post_id'];
	$post = getById($conn, $post_id);
	$categories = getAllCategories($conn);

	?>

	<style>
		.ck-editor {
			height: 10vh;
			background-color: red;
		}

		.ck .ck-reset .ck-editor .ck-rounded-corners {
			background-color: black;
		}
	</style>


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
				<form class="shadow p-3" action="req/post-edit.php" method="post" enctype="multipart/form-data">

					<div class="mb-3">
						<label class="form-label">Title</label>
						<input type="text" class="form-control" name="title" value="<?= $post['post_title'] ?>">
						<input type="text" class="form-control" name="post_id" value="<?= $post['post_id'] ?>" hidden>
						<input type="text" class="form-control" name="cover_url" value="<?= $post['cover_url'] ?>" hidden>
					</div>
					<div class="mb-3">
						<label class="form-label">Cover Image</label>
						<input type="file" class="form-control" name="cover">
						<img src="../upload/blog/<?= $post['cover_url'] ?>" width="200">
					</div>
					<div class="mb-3 editor-container">
						<label class="form-label">Text</label>
						<textarea id="editor" name="text" rows="10" cols="10"><?= $post['post_text'] ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Category</label>
						<select name="category" class="form-control">
							<?php foreach ($categories as $category) {

							?>
								<option value="<?= $category['id'] ?>" <?php echo ($category['id'] == $post['category']) ? "selected" : "" ?>>
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