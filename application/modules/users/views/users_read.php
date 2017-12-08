

        <h2>Users Read</h2>
        <table class="table table-hover table-striped">
	<tr><td>Username</td><td><?php echo $username; ?></td></tr>
	<tr><td>Email</td><td><?php echo $email; ?></td></tr>
	<tr><td>Password</td><td><?php echo $password; ?></td></tr>
	<tr><td>Role</td><td><?php echo $role; ?></td></tr>
	<tr><td>Active</td><td><?php echo $active; ?></td></tr>
	<tr><td>Avatar</td><td><?php echo $avatar; ?></td></tr>
	<tr><td>Verification Code</td><td><?php echo $verification_code; ?></td></tr>
	<tr><td>Remember Me</td><td><?php echo $remember_me; ?></td></tr>
	<tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr>
	<tr><td>Created</td><td><?php echo $created; ?></td></tr>
	<tr><td>Updated</td><td><?php echo $updated; ?></td></tr>
	<tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
