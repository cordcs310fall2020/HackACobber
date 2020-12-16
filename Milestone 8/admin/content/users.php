<div style="margin-top:20px;" class="row">
<!-- Display notification message -->
<?php include(ROOT_PATH.'/section/error-alert.php') ?>

<?php if (empty($users)): ?>
	<h1>No users in the database.</h1>
<?php else: ?>
	<table class="table">
		<thead class="thead-light">
			<th scope="col">N</th>
			<th scope="col">FirstName</th>
			<th scope="col">LastName</th>
			<th scope="col">UserName</th>
			<th scope="col">Address</th>
			<th scope="col">Role</th>
			<th scope="col">Verified</th>
			<th scope="col">Registration Date</th>
			<th colspan="3">Action</th>
		</thead>
		<tbody>
		<?php foreach ($users as $key => $user): ?>
			<tr>
				<td scope="row"><?php echo $key + 1; ?></td>
				<td>
					<?php echo $user['firstname']; ?>
				</td>
				<td>
					<?php echo $user['lastname']; ?>
				</td>
				<td>
					<?php echo $user['username']; ?>; &nbsp;
					<?php echo $user['email']; ?>	
				</td>
				<td> 
				<?php if (empty($user['address'])):?>
					No address registered 
				<?php else: ?>
					<?php echo $user['address']; ?>
					<?php echo $user['state']; ?>
					<?php echo $user['postal_code']; ?>
					<?php echo $user['country']; ?>
				<?php endif ?>
				</td>
				<td><?php if($user['role'] == 1){echo "Admin";}else{ echo "Member";}; ?></td>
				<td><?php if($user['verified'] == 1){echo "Yes";}else{ echo "No";}; ?></td>
				<td>
					<?php echo $user['signup_date']; ?>
				</td>
				<?php if($user['verified'] != 1):?>
				<td>
					<a class="adminbt bi-check btn btn-outline-success"
						href="users.php?verified=<?php echo $user['id'] ?>">
					</a>
				</td>
				<?php endif?>
				<?php if($user['verified'] == 1 && $user['role'] != 1):?>
				<td>
					<a class="adminbt bi-x btn btn-outline-warning"
						href="users.php?unverified=<?php echo $user['id'] ?>">
					</a>
				</td>
				<?php endif?>
				<td>
					<a class="adminbt bi-gear btn btn-outline-primary"
						href="createusers.php?edit-user=<?php echo $user['id'] ?>">
					</a>
				</td>
				<td>
					<a class="adminbt bi-trash btn btn-outline-danger" 
						href="users.php?delete-user=<?php echo $user['id'] ?>">
					</a>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
</div>
<!-- // Display records from DB -->