<?php 

$string = "<h2><i class=\"fa fa-<?=substr(\"$table_name\", 0, -1);?>\" aria-hidden=\"true\"></i> ".ucfirst($table_name)." List</h2>
        <div class=\"row\">
            <div class=\"col-md-4\">
                <?php echo anchor(site_url('".$c_url."/create'),'<i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Create', 'class=\"btn btn-outline-primary my-2 my-sm-0\"'); ?>&nbsp;
                <?php echo anchor(site_url('".$c_url."/create'),'<i class=\"fa fa-upload\" aria-hidden=\"true\"></i> Upload Excel', 'class=\"btn btn-outline-success my-2 my-sm-0\"'); ?>
            </div>
            <div class=\"col-md-4 text-center\">
                <?php if(\$this->session->userdata('message')) { ?>
                    <div id=\"message\" class=\"alert alert-info alert-dismissable\" style=\"margin-bottom: 0px; padding: 6px;\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <?php echo \$this->session->userdata('message'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class=\"col-md-4\">
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline pull-right\" method=\"get\">
                    <div class=\"input-group\">
                        <span class=\"input-group-btn\">
                            <?php if (\$q <> '') { ?>
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
        <div class=\"row\">
            <div class=\"col-md-12\">
                <table class=\"table table-bordered table-hover table-condensed table-striped\" style=\"margin-top: 1rem;\">
                    <tr>
                        <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "<th>".label($row['column_name'])."</th>\n";
}
$string .= "<th>Action</th>
            </tr>\n";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
            <tr>";

$string .= "<td><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "<td style=\"text-align:center\">"
        . "<div class=\"btn-group btn-group-sm\">"
        . "<?php "
        . "echo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-book\" aria-hidden=\"true\"></i>','class=\"btn btn-sm btn-outline-info\" title=\"Read\"'); "
        
        . "echo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>','class=\"btn btn-sm btn-outline-primary\" title=\"Update\"'); "
        
        . "echo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>','class=\"btn btn-sm btn-outline-danger\" title=\"Delete\" onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "?>"
        . "</div></td>";

$string .=  "</tr>
                <?php
            }
            ?>
            </table></div></div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-outline-primary my-2 my-sm-0\"><i class=\"fa fa-calculator\" aria-hidden=\"true\"></i> Total ".ucfirst($table_name)." : <?php echo \$total_rows ?></a>&nbsp;";

if ($export_excel == '1') {
    $string .= "<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> Excel', 'class=\"btn btn btn-outline-success my-2 my-sm-0\"'); ?>&nbsp;";
}
if ($export_word == '1') {
    $string .= "<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Word', 'class=\"btn btn btn-outline-primary my-2 my-sm-0\"'); ?>&nbsp;";
}
if ($export_pdf == '1') {
    $string .= "<?php echo anchor(site_url('".$c_url."/pdf'), '<i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\"></i> PDF', 'class=\"btn btn btn-outline-danger my-2 my-sm-0\"'); ?>";
}

$string .= "</div>
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