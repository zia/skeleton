<?php
    error_reporting(0);
    require_once 'core/harviacode.php';
    require_once 'core/helper.php';
    require_once 'core/process.php';
    
    $fileName=explode("/",$_SERVER['SCRIPT_NAME']);
?>
<!doctype html>
<html>
    <head>
        <title>Harviacode Codeigniter CRUD Generator:: Modified By Ziaur Rahman</title>
        <link rel="stylesheet" href="../vendor/components/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../vendor/fortawesome/font-awesome/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-4" style="border-right:1px solid #000; border-bottom:1px solid #000;">
                    <h3 style="margin-top: 0px;text-align: center;">::Crud Generator::</h3>
                    <hr>
                    <form action="index.php" method="POST">

                        <div class="form-group">
                            <label>
                                <strong><i class="fa fa-table" aria-hidden="true"></i> Select Table -</strong>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-refresh" aria-hidden="true"></i> Refresh
                                </a>
                            </label>
                            <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                <option value="">Please Select</option>
                                <?php
                                    $table_list = $hc->table_list();
                                    $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                    foreach ($table_list as $table) {
                                        ?>
                                        <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        
                        <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                        <strong>Table Type:</strong>&nbsp; 
                        <label class="radio-inline">
                            <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                            Reguler Table &nbsp;
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                            Serverside Datatables &nbsp;
                        </label>

                        <br>
                        <strong>Functions:</strong>&nbsp; 
                        <label class="checkbox-inline">
                            <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                            <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                            Export Excel &nbsp;
                        </label>
                        
                        
                        <label class="checkbox-inline">
                            <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                            <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                            Export Word &nbsp;
                        </label>
                        
                        <label class="checkbox-inline <?php echo file_exists('../vendor/mpdf/mpdf/src/Mpdf.php') ? '' : 'disabled'; ?>">

                            <?php $export_pdf = isset($_POST['export_pdf']) ? $_POST['export_pdf'] : ''; ?>

                            <input type="checkbox" name="export_pdf" value="1" <?php echo $export_pdf == '1' ? 'checked' : ''   ?>
                            <?php echo file_exists('../vendor/mpdf/mpdf/src/Mpdf.php') ? '' : 'disabled'; ?>>
                                            Export PDF
                        </label>

                        <?php echo file_exists('../vendor/mpdf/mpdf/src/Mpdf.php') ? '' : '<small class="text-danger">mpdf required, download <a href="http://harviacode.com">here</a></small>'; ?>

                        
                        <div class="form-group">
                            <label><strong>Custom Controller Name:</strong></label>
                            <input type="text" id="controller" class="form-control" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                        </div>

                        <div class="form-group">
                            <label><strong>Custom Model Name:</strong></label>
                            <input type="text" id="model" class="form-control" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Model Name" />
                        </div>

                        <div class="form-group">
                            <label><strong>Configure Route:</strong></label>
                            <input type="text" id="route" class="form-control" name="route" value="<?php echo isset($_POST['route']) ? $_POST['route'] : '' ?>" class="form-control" placeholder="Route Name" title="e.g. for UserController you mgit want to use 'user' route." disabled />
                        </div>

                        <button type="submit" name="generate" class="btn btn-info" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')">
                            <i class="fa fa-compass" aria-hidden="true"></i> Generate
                        </button>

                        <button type="submit" name="generateall" class="btn btn-success"
                            onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\ \nPlease double check before continue. Continue ?')">
                            <i class="fa fa-globe" aria-hidden="true"></i> Generate All
                        </button>

                        <a href="core/setting.php" class="btn btn-primary">
                            <i class="fa fa-wrench" aria-hidden="true"></i> Setting
                        </a>
                    </form>

                    <br>

                    <?php
                        foreach ($hasil as $h) {
                            echo '<p>' . $h . '</p>';
                        }
                    ?>
                    
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8">
                    <h3 style="margin-top: 0px">Codeigniter CRUD Generator 1.4 by Harviacode
                        <a href="http://<?=$_SERVER[HTTP_HOST].'/'.$fileName[1]?>" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </h3>
                    <p><strong><i class="fa fa-info-circle" aria-hidden="true"></i> About :</strong></p>
                    <p>
                        Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your
                        writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel, and export to word. 
                        This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.
                    </p>
                    <small>* <u>generate textarea and text input only</u></small>
                    <p>
                        Please visit and like <a target="_blank" href="http://harviacode.com"><b>harviacode.com</b></a> for more info and PHP tutorials.
                    </p>
                    <br>
                    <p><h4><u>Preparation before using this CRUD Generator (Important) :</u></h4></p>
                    <ul>
                        <li>On <code>application/config/autoload.php</code>, load <b>database library</b>, <b>session library</b> and <b>url helper</b></li>
                        <li>On <code>application/config/config.php</code>, set :</b>.
                            <ul>
                                <li>$config['base_url'] = 'http://localhost/<?=$fileName[1]?>'</li>
                                <li>$config['index_page'] = ' '</li>
                                <li>$config['url_suffix'] = '.html'</li>
                                <li>$config['encryption_key'] = 'randomstring of 32 character' (<a href="https://randomkeygen.com/" target="_blank">RandomKeyGen</a>)</li>

                            </ul>

                        </li>
                        <li>On <code>application/config/database.php</code>, set hostname, username, password and database.</li>
                    </ul>
                    <p><strong>Using this CRUD Generator :</strong></p>
                    <ul>
                        <li>Simply put <code>harviacode</code> folder, <code>asset</code> folder and .htaccess file into your project root folder.</li>
                        <li>Open <code>http://localhost/<?=$fileName[1]?>/harviacode</code>.</li>
                        <li>Select table and push generate button.</li>
                    </ul>
                    <p><strong>FAQ :</strong></p>
                    <ul>
                        <li>Select table show no data. Make sure you have correct database configuration on <code>application/config/database.php</code> and load <code>database library</code> on <code>autoload.php</code>.</li>
                        <li>Error chmod on mac and linux. Please change your application folder and harviacode folder chmod to 777 </li>
                        <li>Error 404 when click Create, Read, Update, Delete or Next Page. Make sure your mod_rewrite is active 
                            and you can access <code>http://localhost/<?=$fileName[1]?>/welcome</code>. The problem is on htaccess. Still have problem?
                            please go to google and search how to remove index.php codeigniter.
                        </li>
                        <li>Error cannot Read, Update, Delete. Make sure your table have <code>primary key</code>.</li>
                    </ul>
                    <br>
                    <p><strong>Thanks for Support Me</strong></p>
                    <p>Buy me a cup of coffee :)</p>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="52D85QFXT57KN">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    <br>
                    <p><strong>Update</strong></p>

                    <ul>
                        <li>V.1.4 - 26 November 2016
                            <ul>
                                <li>Change to serverside datatables using ignited datatables</li>
                            </ul>
                        </li>
                        <li>V.1.3.1 - 05 April 2016
                            <ul>
                                <li>Put view files into folder</li>
                            </ul>
                        </li>
                        <li>V.1.3 - 09 December 2015
                            <ul>
                                <li>Zero Config for database connection</li>
                                <li>Fix bug searching</li>
                                <li>Fix field name label</li>
                                <li>Add select table from database</li>
                                <li>Add generate all table</li>
                                <li>Select target folder from setting menu</li>
                                <li>Remove support for Codeigniter 2</li>
                            </ul>
                        </li>
                        <li>V.1.2 - 25 June 2015
                            <ul>
                                <li>Add custom target folder</li>
                                <li>Add export to excel</li>
                                <li>Add export to word</li>
                            </ul>
                        </li>
                        <li>V.1.1 - 21 May 2015
                            <ul>
                                <li>Add custom controller name and custom model name</li>
                                <li>Add client side datatables</li>
                            </ul>
                        </li>
                    </ul>

                    <p><strong>&COPY; <?=date('Y')?> <a target="_blank" href="http://harviacode.com">harviacode.com</a></strong></p>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_name = document.getElementById('table_name').value.toLowerCase();
                if (table_name != '') {
                    document.getElementById('controller').value = capitalize(table_name);
                    document.getElementById('model').value = capitalize(table_name) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
        </script>
    </body>
</html>
