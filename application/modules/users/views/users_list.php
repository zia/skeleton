<h2><i class="fa fa-<?=substr("users", 0, -1);?>" aria-hidden="true"></i> Users List</h2>
        <div class="row">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/create'),'<i class="fa fa-plus-circle" aria-hidden="true"></i> Create', 'class="btn btn-outline-primary my-2 my-sm-0"'); ?>&nbsp;
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload Excel
                </button>
            </div>
            <div class="col-md-4 text-center">
                <?php if($this->session->userdata('message')) { ?>
                    <div id="message" class="alert alert-info alert-dismissable" style="margin-bottom: 0px; padding: 6px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->userdata('message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <form action="<?php echo site_url('users/index'); ?>" class="form-inline pull-right" method="get">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <?php if ($q <> '') { ?>
                                    <a href="<?=site_url('users')?>" class="btn btn-danger">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                            <?php
                                }
                            ?>
                        </span>

                        <input type="text" class="form-control" placeholder="Search Users" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-condensed table-striped" style="margin-top: 1rem;">
                    <tr>
                        <th>No</th><th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Avatar</th>
                        <th>Verification Code</th>
                        <th>Remember Me</th>
                        <th>Last Login</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($users_data as $users)
            {
                ?>
            <tr><td><?php echo ++$start ?></td>
				<td><?php echo $users->username ?></td>
				<td><?php echo $users->email ?></td>
				<td><?php echo $users->password ?></td>
				<td><?php echo $users->role ?></td>
				<td><?php echo $users->active ?></td>
				<td><?php echo $users->avatar ?></td>
				<td><?php echo $users->verification_code ?></td>
				<td><?php echo $users->remember_me ?></td>
				<td><?php echo $users->last_login ?></td>
				<td><?php echo $users->created ?></td>
				<td><?php echo $users->updated ?></td><td style="text-align:center"><div class="btn-group btn-group-sm"><?php echo anchor(site_url('users/read/'.$users->id),'<i class="fa fa-book" aria-hidden="true"></i>','class="btn btn-sm btn-outline-info" title="Read"'); echo anchor(site_url('users/update/'.$users->id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-sm btn-outline-primary" title="Update"'); echo anchor(site_url('users/delete/'.$users->id),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-sm btn-outline-danger" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?></div></td></tr>
                <?php
            }
            ?>
            </table></div></div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-outline-info my-2 my-sm-0"><i class="fa fa-calculator" aria-hidden="true"></i> Total Users : <?php echo $total_rows ?></a>&nbsp;<div class="dropdown" style="display: inline;">
            <button type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i> Spreadsheet
            </button>
            <div class="dropdown-menu">
                <?php echo anchor(site_url('users/excel/xlsx'), '.xlsx','class="dropdown-item"'); ?>

                <?php echo anchor(site_url('users/excel/xls'), '.xls','class="dropdown-item"'); ?>

                <?php echo anchor(site_url('users/excel/csv'), '.csv','class="dropdown-item"'); ?>
            </div>
        </div>&nbsp;<?php echo anchor(site_url('users/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Word', 'class="btn btn btn-outline-primary my-2 my-sm-0"'); ?>&nbsp;<?php echo anchor(site_url('users/pdf'), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF', 'class="btn btn btn-outline-danger my-2 my-sm-0"'); ?></div>
            <div class="col-md-4 offset-md-2 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<!-- Upload Excel Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i> Upload Spreadsheet
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php echo form_open_multipart('users/upload_excel', 'class="form-inline"'); ?>
                    <ul class="list-group" id="FileHelpBlock" style="margin-bottom: 15px;">
                        <li class="list-group-item">Make Sure You have all columns in your spreadsheet or nullable value in your DB. A single error can cause unsuccessful file upload.</li>
                        <li class="list-group-item">You can download the excel file using the button at the bottom of this page, modify it and then upload it for better result.</li>
                        <li class="list-group-item">Supported File Types: .xls | .xlsx | .csv</li>
                    </ul>

                    <div class="form-group">
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="userfile" aria-describedby="FileHelpBlock" required>
                            <span class="custom-file-control"></span>
                        </label>
                    </div>&nbsp;

                    <button type="submit" class="btn btn-outline-success">
                        <i class="fa fa-upload" aria-hidden="true"></i> Upload
                    </button>
                    
                <?php echo form_close(); ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>