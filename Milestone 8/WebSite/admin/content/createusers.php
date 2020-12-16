<div class="row">
<div style="align-content: center;max-width: 600px;" class="container">
	<div class="p-3 mb-3 bg-light rounded">
			<form method="post" action="users.php" >
				<?php include(ROOT_PATH.'/section/error-alert.php') ?>
				<?php if ($isEditingUser === true): ?>
					<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<?php endif ?>
				<div class="row">
				<div class="col-md-6 mb-2">
				<input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" placeholder="Firstname"></div>
				<div class="col-md-6 mb-2">
				<input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Lastname"></div></div>
				<div class="mb-2">
				<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username"></div>
				<div class="mb-2">
				<input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Email"></div>
				<div class="row">
				<div class="col-md-6 mb-2">
				<input type="password" class="form-control" name="password" placeholder="Password"></div>
				<div class="col-md-6 mb-2">
				<input type="password" class="form-control" name="passwordverification" placeholder="Password confirmation"></div></div>
				<div class="mb-2">
				<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Address with City"></div>
				<div class="row">
				<div class="col-md-6 mb-2">
				<select class="custom-select d-block" name="state">
					<option value="" selected disabled>State</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select></div>
				<div class="col-md-6 mb-2">
				<input type="text" class="form-control" name="postal_code" value="<?php echo $postal_code; ?>" placeholder="Zip Code"></div></div>
				<div class="mb-2">
				<select class="custom-select d-block" name="country">
					<option value="" selected disabled>Country</option>
					<option value="US">United States</option>
					<option value="CA">Canada</option>
				</select></div>
				<div class="row">
				<div class="col-md-6 mb-2">
				<select class="custom-select d-block" name="role">
					<?php if($role !=0 && $role != 1):?>
					<option value="" selected disabled>Assign role</option>
					<?php endif?>
					<?php if($user_id != 1 && $role != 1):?>
					<option value="0" <?php if(empty($role)){ echo "selected";}?>>Member</option>
					<?php endif?>
					<option value="1" <?php if($role == 1 ){ echo "selected";}?>>Admin</option>
				</select></div>
				<div class="col-md-6 mb-2">
				<select class="custom-select d-block" name="position">
					<option value="" selected disabled>Assign position</option>
					<option value="noposition">N/A</option>
					<option value="professor">Professor</option>
					<option value="researcher">Researcher</option>
					<option value="student">Student</option>
				</select></div></div>
				<div class="mb-2">
				<?php if ($isEditingUser === true): ?> 
					<button type="submit" class="btn btn-outline-success btn-lg btn-block" name="update_user">Update User</button>
				<?php else: ?>
					<button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="create_user">Create User</button>
				<?php endif ?></div>
			</form>
				</div></div>
		</div>