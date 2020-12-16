
<div class="row">
<div style="align-content: center;max-width: 600px;" class="container">
	<div class="p-3 mb-3 bg-light rounded">
			<form method="post" action="<?php echo $actual_link. '/admin/topics.php'; ?>" >
				
				<?php include(ROOT_PATH.'/section/error-alert.php') ?>
				<?php if ($isEditingTopic === true): ?>
					<input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
				<?php endif ?>
				<div class="mb-2">
				<input type="text" class="form-control" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Topic"></div>
				<div class="mb-2">
				<?php if ($isEditingTopic === true): ?> 
					<button type="submit" class="btn btn-outline-success btn-lg btn-block" name="update_topic">Update Topic</button>
				<?php else: ?>
					<button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="create_topic">Create Topic</button>
				<?php endif ?>
				</div>
			</form>
	</div>
	</div>
	</div>
