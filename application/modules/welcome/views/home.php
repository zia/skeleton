<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Codeigniter Skeleton</h1>
        <p>This is Homepage !</p>
        <ol>
        	<li>Change the <code>application/views/layouts/header</code> and <code>application/views/layouts/footer</code></li>
        	<li>Change the <code>application/views/layouts/sidebar</code> too.</li>
        	<li>Use
        		<code><a href="<?=base_url()?>harviacode">Harviacode</a></code>
        		 to generate <code>CRUD</code> application.
        	</li>
        	<li>You'll find harviacode files in <code>harviacode/core</code> folder.</li>
        	<li>To create <code>Migration</code> files, open <code>CLI</code> from root folder and type <code>ci migrate generate 'your_migration_name'</code> 'your_migration_name' should be at least 4 character long. Timestamp will be added with the name.</li>
            <li>To Generate <code>Migration</code> from existing databases, open <code>CLI</code> from root folder and type <code>ci migrateall</code>Timestamp will be added with the generated migration file name.</li>
            <li>You'll find your migration files under <code>application/migrations</code> directory.</li>
            <li>There is an initial migration file with <code>dbforge</code> to create a database named <code>sample_db</code> you can change it with yours.</li>
            <li>To migrate in <code>cli</code> run this command <code>ci migrate version 'timestamp_of_migration_file'</code></li>
        	<li>REST..</li>
        </ol>
    </div>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
</p>