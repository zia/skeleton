

        <h2 style="margin-top:0px">Books <?php echo $button ?></h2>
        <?=form_open($action)?>
	    <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('books') ?>" class="btn btn-default">Cancel</a>
	<?=form_close()?>
