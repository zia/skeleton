<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
    			</div>
    			<!-- Column -->
        	</div>
        	<!-- Row -->
    	</div>
    	<!-- container -->

        <!-- CSRF Configuration For AJAX -->
        <script type="text/javascript">
            var base_url = '<?=base_url()?>';
            var csfrData = {};
            csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
        </script>

		<?=script_tag([
            'jquery'              => 'vendor/components/jquery/jquery.min.js',
            'popper'              => 'assets/js/popper.js',
            'tether'              => 'vendor/bordercloud/tether/dist/js/tether.min.js',
            'bootstrap'           => 'vendor/components/bootstrap/js/bootstrap.min.js',
            'jquery_datatable'    => 'vendor/datatables/datatables/media/js/jquery.dataTables.min.js',
            'datatable_bootstrap' => 'vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js',
            'script'              => 'assets/js/script.js'
            ])
        ?>
	</body>
</html>
