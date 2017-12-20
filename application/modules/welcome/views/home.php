<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h1>Codeigniter Skeleton</h1>
            <p>A codeigniter application with HMVC and CRUD</p> 
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <h3>Installation</h3>
                <ul class="list-group">
                    <li class="list-group-item">Download/clone the repo and run <code>composer install</code> (if <a href="https://getcomposer.org/">composer</a> installed globally in your system) and you're ready to go.</li>
                </ul>
            </li>

            <li class="list-group-item">
                <h3>Notes</h3>
                <ul class="list-group">
                    <li class="list-group-item">You'll find this file in <code>application/modules/welcome/views/home.php</code></li>

                    <li class="list-group-item">Change the <code>application/views/layouts/header.php</code> and <code>application/views/layouts/footer.php</code> to your needs.</li>
                    <li class="list-group-item">There is a sidebar too @ <code>application/views/layouts/sidebar.php</code>, not initially added.</li>

                    <li class="list-group-item">Bootstrap 4 is being used. <code>popper.js</code> is stored statically in <code>assets</code> folder as bootstrap needs it.</li>

                    <li class="list-group-item"><code>xmlrpc</code> won't work with <code>CSRF</code> enabled.</li>

                    <li class="list-group-item">Changing the name of <code>application</code> and <code>system</code> folder won't work as some of the CRUD features are written static way.</li>
                </ul>
            </li>

        	<li class="list-group-item">
                <h3>CRUD</h3>
                <ul class="list-group">
                    <li class="list-group-item">Use
                		<code><a href="<?=base_url()?>harviacode">Harviacode</a></code>
                		 to generate <code>CRUD</code> application.
                	</li>

                	<li class="list-group-item">You'll find harviacode files in <code>harviacode/core</code> folder.</li>

                    <li class="list-group-item">Your codes will be generated in <code>application/modules</code> folder. For example, Generating users from DB will be stored in <code>application/modules/users/..</code> folder.</li>
                </ul>
            </li>

            <li class="list-group-item">
                <h3>Database Migration</h3>
                <ul class="list-group">
                	<li class="list-group-item">To create <b>Migration</b> files, open <code>CLI</code> from root folder and type <code>.\ci migrate create [your_migration_name]</code> <b>Ex: .\ci migrate create books</b>. Your migration name should be at least 4 character long. Timestamp will be added with the name.</li>

                    <li class="list-group-item">To Generate <b>Migrations</b> from existing databases, open <code>CLI</code> from root folder and type <code>.\ci migrate generate</code> <b>for all tables in DB</b> and <code>.\ci migrate generate [TABLE_NAME]</code> <b>for specific table(without the brace, Ex: .\ci migrate generate users) in DB</b>. Timestamp will be added with the generated migration file name.</li>

                    <li class="list-group-item">To <b>Apply</b> or <b>Rollback</b> from migrations run <code>.\ci migrate version [timestamp_of_migration_file]</code> <b>Ex: .\ci migrate version books 20171219193316</b></li>

                    <li class="list-group-item">You'll find your migration files under <code>application/migrations</code> directory.</li>

                    <li class="list-group-item">To check available migrations run this command <code>.\ci migrate lists</code>.</li>
                </ul>
            </li>


        	<li class="list-group-item">
                <h3>REST API</h3>
                <ul class="list-group">
                    <li class="list-group-item"></li>
                </ul>
            </li>

            <li class="list-group-item">
                <h3>Unit testing</h3>
                <ul class="list-group">
                    <li class="list-group-item"></li>
                </ul>
            </li>

            <li class="list-group-item">
                <h3>Links</h3>
                <ul class="list-group">
                    <li class="list-group-item"></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
</p>