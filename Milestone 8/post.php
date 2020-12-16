<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/functions.php');
require_once( ROOT_PATH . '/section/dlinks.php');
if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) {header ("Location: login.php");}
$page_title = "Data";
$churchadminpage = 'data';
?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>
<?php include_once(ROOT_PATH .'/section/user-header.php');  ?>
<?php include_once(ROOT_PATH .'/menu/user-top-menu.php');  ?>
<div style="min-height: 93vh;" class="church_auth">
  <div class="church_auth_content">

	<main style="padding-top: 68px;">
	
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
		<div class="container">
			<div class="row">

	<aside style="margin-bottom: 38px;" class="col-md-4">
	<div class="card">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<ul class="list-group list-group-flush">
					<?php foreach ($topics as $topic): ?>
						<li class="list-group-item"><a class="nav-link"
							href="<?php echo $actual_default_link . '/specifictopic.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> </li>
					<?php endforeach ?>
					</ul>
			</div>
		</div>
	</aside>
	<div class="col-md-8">
	<div class="p-3 mb-3 bg-light rounded">
			<?php if (isset($_SESSION['verified']) && $_SESSION['verified'] != 1): ?>
				<h2 class="font-italic">Sorry... But your account hasn't been approved yet!</h2>
				<?php header ("Location: notverified.php");?>
			<?php else: ?>
				<h2 class="font-italic"><?php echo $post['title']; ?></h2>
				<p class="mb-0">
					<?php echo html_entity_decode($post['body']); ?>
				</p>
			<?php endif ?>
			</div>
		</div>
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