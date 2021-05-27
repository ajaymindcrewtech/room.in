<?php 

$string = "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <h1>
            ".ucfirst($table_name)." Read          
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"box box-primary\">
                    <!-- /.box-header -->
                    <div class=\"box-body\">
                        <!-- ******************/master header end ****************** -->
        <table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td><b>".label($row["column_name"])."</b></td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>
         <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>