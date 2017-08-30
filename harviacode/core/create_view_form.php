<?php 

$string = "\n
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2>
        <?=form_open(\$action)?>";

foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t<?=form_close()?>\n";



$folderPath = $target.'modules/'.$c_url.'/views';
    if (!is_dir($folderPath)) {
        try{
            mkdir($folderPath, 0777, true);
        }
        catch(Exception $e) {
            echo "Error:\n" . $e->getMessage() . PHP_EOL;
        }
    }
    
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



$hasil_view_form = createFile($string, $folderPath . "/" . $v_form_file);

?>