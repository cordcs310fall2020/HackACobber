<!-- Display records from DB-->
		<div class="row">
				<?php include(ROOT_PATH.'/section/error-alert.php') ?>
			<?php if (empty($topics)): ?>
				<h1>No topics in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead class="thead-light">
						<th scope="col">N</th>
						<th scope="col">Topic Name</th>
						<th scope="col" colspan="2">Action</th>
					</thead>
					<tbody>
					<?php foreach ($topics as $key => $topic): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $topic['name']; ?></td>
							<td>
								<a class="adminbt bi-gear btn btn-outline-primary"
									href="createtopics.php?edit-topic=<?php echo $topic['id'] ?>">
								</a>
							</td>
							<td>
								<a class="adminbt bi-trash btn btn-outline-danger"								
									href="topics.php?delete-topic=<?php echo $topic['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->