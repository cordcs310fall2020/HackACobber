<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/functions.php');
require_once( ROOT_PATH . '/section/dlinks.php');
$page_title = "Home";
$churchadminpage = 'home';
?>
<?php include(ROOT_PATH .'/section/user-header.php');  ?>
<?php $posts = getPublishedPosts(); ?>
<?php include_once(ROOT_PATH .'/menu/user-top-menu.php');  ?>
<div style="min-height: 93vh;" class="church_auth">
  <div class="church_auth_content">

    <main style="padding-top: 68px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">

<div class="container">
	<?php foreach ($posts as $post): ?>
<div style="margin-top: 38px;" class="card text-center">
<?php if (isset($post['topic']['name'])): ?>
			<div class="card-header"><a href="<?php echo $actual_default_link. '/specifictopic.php?topic=' . $post['topic']['id'] ?>"
				class=""><?php echo $post['topic']['name'] ?></a></div>
		<?php endif ?>
	<?php if($post['image'] !=''):?>
<img class="card-img-top" src="<?php echo $actual_default_link. '/assets/img/' . $post['image']; ?>" alt="Card image cap">
<?php endif?>
  <div class="card-body">
    <p class="card-text"><?php echo $post['title'] ?></p>
    <a href="post.php?post-slug=<?php echo $post['slug']; ?>" class="btn btn-primary">Read more...</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo date("F j, Y ", strtotime($post["updated_date"])); ?>
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
