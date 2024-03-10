<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
	$post_id = $_GET['post_id'];

	include_once("data/Post.php");
	include_once("../db_conn.php");
	$post = getByIdDeep($conn, $post_id);
	$category = getCategoryById($conn, $post['category']);

?>
	<?php include_once 'header.php'; ?>
	<link rel="stylesheet" href="../css/richtext.min.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

	<?php
	$key = "hhdsfs1263z";
	?>

	<!-- End of Topbar -->

	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="card main-blog-card mb-5">
					<img src="../upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $post['post_title'] ?></h5>
						<?= $post['post_text'] ?>
						<hr>
						<p class="card-text d-flex justify-content-between">
							<b>Category: <?= $category['category'] ?></b>
							<small class="text-body-secondary">Date: <?= $post['crated_at'] ?></small>
						</p>
					</div>
				</div>

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