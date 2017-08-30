<?php 

$string = "
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <h2 style=\"margin-top:0px\"><i class=\"fa fa-<?=substr(\"$table_name\", 0, -1);?>\" aria-hidden=\"true\"></i> ".ucfirst($table_name)." List</h2>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 4px\"  id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-4 text-right\">
                <?php echo anchor(site_url('".$c_url."/create'), '<i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Create', 'class=\"btn btn-outline-primary my-2 my-sm-0\"'); ?>";

if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-outline-success my-2 my-sm-0\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-outline-primary my-2 my-sm-0\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-outline-danger my-2 my-sm-0\"'); ?>";
}
$string .= "\n\t    </div>
        </div>
        <table class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th width=\"200px\">Action</th>
                </tr>
            </thead>\n<tbody>\n";


$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "<?php
                \$counter = 0;
                foreach ($" . $c_url . "_data as \$$c_url) {
            ?>
                <tr>";

$string .= "\n\t\t\t\t<td><?php echo ++\$counter ?></td>";


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
            ?>";

$string .= "\n\t</tbody>\n</table>
    <!--
    <script>
        $(document).ready(function() {
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    \"iStart\": oSettings._iDisplayStart,
                    \"iEnd\": oSettings.fnDisplayEnd(),
                    \"iLength\": oSettings._iDisplayLength,
                    \"iTotal\": oSettings.fnRecordsTotal(),
                    \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                    \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var t = $(\"#mytable\").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#mytable_filter input')
                            .off('.DT')
                            .on('keyup.DT', function(e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                        }
                    });
                },
                oLanguage: {
                    sProcessing: \"loading...\"
                },
                processing: true,
                serverSide: true,
                ajax: {\"url\": \"\".$c_url.\"/json\", \"type\": \"POST\"},
                columns: [
                    {
                        \"data\": \"$pk\",
                        \"orderable\": false
                    },\".$col_non_pk.\",
                    {
                        \"data\" : \"action\",
                        \"orderable\": false,
                        \"className\" : \"text-center\"
                    }
                ],
                order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
    </script>
    -->
";

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


$hasil_view_form = createFile($string, $folderPath . "/" . $v_list_file);


#$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>