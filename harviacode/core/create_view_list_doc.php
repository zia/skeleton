<?php 

$string = "<!doctype html>
<html>
    <head>
        <title>".ucfirst($table_name)."</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('vendor/components/bootstrap/css/bootstrap.min.css') ?>\"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>".ucfirst($table_name)." List</h2>
        <table class=\"word-table\" style=\"margin-bottom: 10px\">
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t</tr>";
$string .= "<?php
            foreach ($".$c_url."_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t      <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t      <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .=  "\t
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>";

$folderPath = $target.'modules/'.$c_url.'/views';
if (!is_dir($folderPath)) {
    try{
        mkdir($folderPath, 0777, true);
    }
    catch(Exception $e) {
        echo "Error:\n" . $e->getMessage() . PHP_EOL;
    }
}

$hasil_view_doc = createFile($string, $folderPath . "/" . $v_doc_file);

?>