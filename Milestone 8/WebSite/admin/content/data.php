
				
<?php include(ROOT_PATH.'/section/error-alert.php') ?>
			<?php if (empty($posts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else: ?>
				<table class="table">
						<thead class="thead-light">
						<th scope="col">N</th>
						<th scope="col">Author</th>
						<th scope="col">Title</th>
						<th scope="col">Views</th>
						<?php if ($_SESSION['role'] == 1): ?>
							<th scope="col"><small>Visible</small></th>
						<?php endif ?>
						<th scope="col"><small>Edit</small></th>
						<th scope="col"><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($posts as $key => $post): ?>
						<tr>
							<td scope="row"><?php echo $key + 1; ?></td>
							<td><?php echo $post['author']; ?></td>
							<td>
								<a 	target="_blank" href="<?php echo $actual_post_link .$post['slug'] ?>">
									<?php echo $post['title']; ?>	
								</a>
							</td>
							<td><?php echo $post['views']; ?></td>
							
							<?php if ($_SESSION['role'] == 1 ): ?>
								<td>
								<?php if ($post['published'] == true): ?>
									<a class="adminbt bi-x btn btn-outline-warning"href="data.php?unpublish=<?php echo $post['id'] ?>">
									</a>
								<?php else: ?>
									<a class="adminbt bi-check btn btn-outline-success" href="data.php?publish=<?php echo $post['id'] ?>">
									</a>
								<?php endif ?>
								</td>
							<?php endif ?>

							<td>
								<a class="adminbt bi-gear btn btn-outline-primary" href="createpost.php?edit-post=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="adminbt bi-trash btn btn-outline-danger" href="createpost.php?delete-post=<?php echo $post['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>