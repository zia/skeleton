

        <h2 style="margin-top:0px"><i class="fa fa-<?=substr("books", 0, -1);?>" aria-hidden="true"></i> Books List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('books/create'),'<i class="fa fa-plus-circle" aria-hidden="true"></i> Create', 'class="btn btn-outline-primary my-2 my-sm-0"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-3 offset-md-1 text-right">
                <form action="<?php echo site_url('books/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '') {
                            ?>
                                    <a href="<?=site_url('books')?>" class="btn btn-danger">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                            <?php
                                }
                            ?>
                        </span>

                        <input type="text" class="form-control" placeholder="Search Books" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed table-striped" style="margin-bottom: 10px">
            <tr>
                <th width="80px">No</th>
				<th>Title</th>
				<th>Action</th>
            </tr>
<?php
            foreach ($books_data as $books)
            {
                ?>
            <tr>
				<td><?php echo ++$start ?></td>
				<td><?php echo $books->title ?></td>
				<td style="text-align:center" width="200px">
					<?php 
				echo anchor(site_url('books/read/'.$books->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('books/update/'.$books->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('books/delete/'.$books->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>

				</td>
			</tr>
                <?php
            }
            ?>
            
		</table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-outline-primary my-2 my-sm-0">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-4 offset-md-2 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
