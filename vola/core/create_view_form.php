<?php 

$string = "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <h1>
            ".ucfirst($table_name)." <?php echo \$button ?>          
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
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
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
$string .= "\n\t</form>
     <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>