<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/functions.php');
header ("Location: index.php");
?>

<?php 
	if (isset($_GET['search-k'])) {
		$sk = $_GET['search-k'];
		$display_words = getKeywords($sk);
	}
?>
<?php include_once(ROOT_PATH .'/section/user-header.php');  ?>
<?php include_once(ROOT_PATH .'/menu/user-top-menu.php');  ?>
<div class="church_auth">
  <div class="church_auth_content">

    <main style="padding-top: 68px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">

<div class="container">
	<h2 class="align-items-center">
		<?php echo getTopicNameById($topic_id); ?>
	</h2>
	<hr>
	<?php foreach ($posts as $post): ?>
<div style="margin-top: 38px;" class="card text-center">
	<?php if (!(isset($post['image']))):?>
<img class="card-img-top" src="<?php echo $actual_link. '/assets/img/' . $post['image']; ?>" alt="Card image cap">
<?php endif?>
  <div class="card-body">
    <p class="card-text"><?php echo $post['title'] ?></p>
    <a href="post.php?post-slug=<?php echo $post['slug']; ?>" class="btn btn-primary">Read more...</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo date("F j, Y ", strtotime($post["created_date"])); ?>
  </div>
</div>
	<?php endforeach ?>
</div>
        </div>
      </div>
    </main>
  </div>
  
</div>
  <?php include_once(ROOT_PATH .'/section/footer.php')?>
	</body>
<?php include('assets/script-link.php');  ?>
</html>
