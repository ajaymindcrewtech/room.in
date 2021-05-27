<?php 

$string = "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <h1>
            ".ucfirst($table_name)." List          
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
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
              
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 4px\"  id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-4 text-right\">
                <?php echo anchor(site_url('".$c_url."/create'), 'Create', 'class=\"btn btn-primary\"'); ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
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
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t    <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .= "\n\t\t    <td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t<?php "
        . "\n\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\"></i>'); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\"></i>'); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t?>"
        . "\n\t\t    </td>";

$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src=\"<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#mytable\").dataTable();
            });
        </script>
    <!-- ******************/master footer ****************** -->
                    </div>
                </div>
            </div>
    </section>
    </div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>