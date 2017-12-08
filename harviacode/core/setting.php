<?php
    error_reporting(0);
    require_once 'helper.php';
    $res = '';
    $get_setting = readJSON('settingjson.cfg');

    if (isset($_POST['save'])) {

        $target = $_POST['target'];

        $string = '{
            "target": "'.$target.'",
            "copyassets": "0"
        }';

        $hasil_setting = createFile($string, 'settingjson.cfg');
        $res = '<strong>Setting Updated</strong>';
    }
?>
<!doctype html>
<html>
    <head>
        <title>Harviacode Codeigniter CRUD Generator:: Modified By Ziaur Rahman</title>
        <link rel="stylesheet" href="../../vendor/components/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../vendor/fortawesome/font-awesome/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
            <h3><i class="fa fa-bullseye" aria-hidden="true"></i> Target Folder</h3>
            <hr>
            <?php if($res) { ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $res; ?>
                </div>
            <?php } ?>
            <form action="setting.php" method="POST">

                <?php $target = $_POST['target'] ? $_POST['target'] : $get_setting->target; ?>
                <strong><i class="fa fa-folder" aria-hidden="true"></i> Folders:</strong>&nbsp;
                <label class="radio-inline">
                    <input type="radio" name="target" value="../application/" <?php echo $target == '../application/' ? 'checked' : ''; ?>>
                    ../application/ &nbsp;
                </label>
                
                <label class="radio-inline">
                    <input type="radio" name="target" value="output/" <?php echo $target == 'output/' ? 'checked' : ''; ?>>
                    output/
                </label>
                
                <br><br>

                <button type="submit" name="save" class="btn btn-primary">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                </button>
                <a href="../index.php" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </form>
        </div>
        <script src="../../vendor/components/jquery/jquery.min.js" type='text/javascript'></script>
        <script src="../../vendor/bordercloud/tether/dist/js/tether.min.js"  type='text/javascript'></script>
        <script src="../../vendor/components/bootstrap/js/bootstrap.min.js" type='text/javascript'></script>
    </body>
</html>

