<?php 

$string = "\n
        <h2 style=\"margin-top:0px\"><i class=\"fa fa-<?=substr(\"$table_name\", 0, -1);?>\" aria-hidden=\"true\"></i> ".ucfirst($table_name)." List</h2>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <?php echo anchor(site_url('".$c_url."/create'),'<i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Create', 'class=\"btn btn-outline-primary my-2 my-sm-0\"'); ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 8px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-3 offset-md-1 text-right\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '') {
                            ?>
                                    <a href=\"<?=site_url('$c_url')?>\" class=\"btn btn-danger\">
                                        <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
                                    </a>
                            <?php
                                }
                            ?>
                        </span>

                        <input type=\"text\" class=\"form-control\" placeholder=\"Search $c\" name=\"q\" value=\"<?php echo \$q; ?>\">
                        <span class=\"input-group-btn\">
                            <button class=\"btn btn-primary\" type=\"submit\">
                                <i class=\"fa fa-search\" aria-hidden=\"true\"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class=\"table table-bordered table-hover table-condensed table-striped\" style=\"margin-bottom: 10px\">
            <tr>
                <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t<th>Action</th>
            </tr>\n";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
            <tr>";

$string .= "\n\t\t\t\t<td><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
        . "\n\t\t\t\techo ' | '; "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t\t?>"
        . "\n\n\t\t\t\t</td>";

$string .=  "\n\t\t\t</tr>
                <?php
            }
            ?>
            \n\t\t</table>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-outline-primary my-2 my-sm-0\">Total Record : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn btn-outline-success my-2 my-sm-0\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn btn-outline-primary my-2 my-sm-0\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn btn-outline-danger my-2 my-sm-0\"'); ?>";
}
$string .= "\n\t    </div>
            <div class=\"col-md-4 offset-md-2 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>\n";

$folderPath = $target.'modules/'.$c_url.'/views';
    if (!is_dir($folderPath)) {
        try{
            mkdir($folderPath, 0777, true);
        }
        catch(Exception $e) {
            echo "Error:\n" . $e->getMessage() . PHP_EOL;
        }
    }
    
/*
$newContent = '
<!DOCTYPE html>
<html>
    <head>
        <title>403 Forbidden</title>
    </head>
    <body>

        <p>Directory access is forbidden.</p>

    </body>
</html>';

file_put_contents($folderPath.'/index.html',$newContent);
*/


$hasil_view_form = createFile($string, $folderPath . "/" . $v_list_file);

?>