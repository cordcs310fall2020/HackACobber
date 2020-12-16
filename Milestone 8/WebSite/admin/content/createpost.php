<div class="card-body">
			<form method="post" enctype="multipart/form-data" action="<?php echo $actual_link. '/admin/createpost.php'; ?>" >
				
<?php include(ROOT_PATH.'/section/error-alert.php') ?>
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>
				<div class="mb-2">
				<input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Title">
				</div>
				<div class="mb-2">
				<div class="custom-file">
				<input class="custom-file-input" id="validatedCustomFile" required type="file" name="featured_image" >
				<label class="custom-file-label" for="validatedCustomFile">Featured image</label>
				</div>
				</div>
				<div class="mb-2">
				<textarea name="body" id="body" cols="3" rows="10"><?php echo $body; ?></textarea>
				</div>
				<div class="row">
				<div class="col-md-6 mb-2">
				<select class="custom-select d-block w-100" name="topic_id">
					<option value="" selected disabled>Choose topic</option>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
					</div>
				<div class="col-md-6 mb-2">
					<?php if ($published == true): ?>
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" value="1" name="publish" id="publish" checked="checked">
					<label class="custom-control-label" for="publish">Visible</label>
					</div>
					<?php else: ?>
					<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" value="1" name="publish" id="publish">
					<label class="custom-control-label" for="publish">Hidden</label>
					</div>
					<?php endif ?>
					</div></div>
					
				<div class="mb-2">
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn btn-outline-success btn-lg btn-block" name="update_post">Update Data</button>
				<?php else: ?>
					<button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="create_post">Save Data</button>
				<?php endif ?>
				</div>

			</form>
		</div>