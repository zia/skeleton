

        <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
        <?=form_open($action)?>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role <?php echo form_error('role') ?></label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Active <?php echo form_error('active') ?></label>
            <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Avatar <?php echo form_error('avatar') ?></label>
            <input type="text" class="form-control" name="avatar" id="avatar" placeholder="Avatar" value="<?php echo $avatar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Verification Code <?php echo form_error('verification_code') ?></label>
            <input type="text" class="form-control" name="verification_code" id="verification_code" placeholder="Verification Code" value="<?php echo $verification_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Remember Me <?php echo form_error('remember_me') ?></label>
            <input type="text" class="form-control" name="remember_me" id="remember_me" placeholder="Remember Me" value="<?php echo $remember_me; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Last Login <?php echo form_error('last_login') ?></label>
            <input type="text" class="form-control" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created <?php echo form_error('created') ?></label>
            <input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated <?php echo form_error('updated') ?></label>
            <input type="text" class="form-control" name="updated" id="updated" placeholder="Updated" value="<?php echo $updated; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	<?=form_close()?>
