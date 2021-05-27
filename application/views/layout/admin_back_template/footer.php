<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    Justice Tankha Memorial Rotary Institute For Special Children, Jabalpur &copy; 2017 | All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<!-- <script src="<?php echo base_url();?>backend/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(function () {
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd',
        });
    });
     $(function () {
        //Date picker
        $('.datepicker_multi').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd',
            multidate: true
        });
    });
</script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript">

	$(document).ready(function(){
        $('input[name="state_value[]"]').click(function(){
            if($(this).prop("checked") == true || $(this).prop("checked") == false){
				var favorite = [];
				$.each($("input[name='state_value[]']:checked"), function(){            
				favorite.push($(this).val());
            });
           		 alert("My favourite sports are: " + favorite.join(", "));
              // alert($("input[name='chk[]']").val());
            }           
        });
    });



  $(document).ready(function(){
    var countLi = $('ul.ql').children('li').length;
        $(".count-li").html(countLi);
   $('#menu_type').change(function(){
      var value = this.value;
      if(value == 1 || value== 3){
        $('#menu_link1').show();
        $('#menu_link').hide();
      }
      else if(value == 2){
         $('#menu_link1').hide();
        $('#menu_link').show();
      }
    });
   
   var url = $('#base_url').val();

  $('#countryid').change(function(){
     var countryid = this.value;
     var dataString = 'id='+countryid;
      $.ajax({
      type: "POST",
      url: url+'admin/job/getstate',
      data: dataString,
      cache: false,
      dataType: "json",
      success: function(result){
         
         /*  
        var list = '';
        $.each(result, function (i, item) {
         list += '<div class="ui-dropdownchecklist-item" style="white-space: nowrap;"><input type="checkbox" index="'+result[i].id+'" value="'+result[i].state_name+'"><span class="ui-dropdownchecklist-text" style="cursor: default; width: 100%;">'+result[i].state_name+'</span></div>';
        });//end each
         $('#stateid').html(list);
        
         */
       
        var list = '<option value="">--select--</option>';
         var list1 = '';
   //      list1 += '<li class="multiselect-item multiselect-all"><a tabindex="0" class="multiselect-all"><label class="checkbox"><input type="checkbox" value="multiselect-all">  Select all</label></a></li>';
        $.each(result, function (i, item) {
         list += '<option value="'+result[i].id+'">'+result[i].state_name+'</option>';
         list1 += '<li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="'+result[i].id+'" name="state_value[]"> '+result[i].state_name+'</label></a></li>';

        });//end each
         $('#stateid').html(list);
       $('#state_chkbox').html(list1);
        
         
         
        }//end sucess
      });//end ajax
    });//end change
   
   



    $('#cityid').change(function(){
     var cityid = this.value;
     var dataString = 'id='+cityid;
      $.ajax({
      type: "POST",
      url: url+'admin/job/getarea',
      data: dataString,
      cache: false,
      dataType: "json",
      success: function(result){
        var list = '<option value="">--select--</option>';
        $.each(result, function (i, item) {
         list += '<option value="'+result[i].id+'">'+result[i].area_name+'</option>';
        });//end each
        list += '<option value="-1">other</option>';
         $('#areaid').html(list);
        }//end sucess
      });//end ajax
    });//end change


    $('#areaid').change(function(){
     var areaid = this.value;
     if(areaid=='-1'){
      $('.otherarea').show();
     }
     else{
      $('.otherarea').hide();
     }
    });//end change

     
     var countryvalue = $('#countryvalue').val();
     var statevalue = $('#statevalue').val();
     var cityvalue = $('#cityvalue').val();
     var areavalue = $('#areavalue').val();

     if(countryvalue!=''){
     var dataString = 'id='+countryvalue;
      $.ajax({
      type: "POST",
      url: url+'admin/job/getstate',
      data: dataString,
      cache: false,
      dataType: "json",
      success: function(result){
        var list = '<option value="">--select--</option>';
        $.each(result, function (i, item) {
         if(result[i].id==statevalue){
          var sel = 'selected';
         }
         else{
          sel = '';
         }

         list += '<option value="'+result[i].id+'" '+sel+'>'+result[i].state_name+'</option>';
        });//end each
         $('#stateid').html(list);
        }//end sucess
      });//end ajax
     }
   
   if(statevalue!=''){
     var dataString = 'id='+statevalue;
      $.ajax({
      type: "POST",
      url: url+'admin/job/getcity',
      data: dataString,
      cache: false,
      dataType: "json",
      success: function(result){
        var list = '<option value="">--select--</option>';
        $.each(result, function (i, item) {
         if(result[i].id==cityvalue){
          var sel = 'selected';
         }
         else{
          sel = '';
         }
         list += '<option value="'+result[i].id+'" '+sel+'>'+result[i].city_name+'</option>';
        });//end each
         $('#cityid').html(list);
        }//end sucess
      });//end ajax
   }

    if(cityvalue!=''){
     var dataString = 'id='+cityvalue;
      $.ajax({
      type: "POST",
      url: url+'admin/job/getarea',
      data: dataString,
      cache: false,
      dataType: "json",
      success: function(result){
        var list = '<option value="">--select--</option>';
        $.each(result, function (i, item) {
         if(result[i].id==areavalue){
          var sel = 'selected';
         }
         else{
          sel = '';
         }
         list += '<option value="'+result[i].id+'" '+sel+'>'+result[i].area_name+'</option>';
        });//end each
         list += '<option value="-1">other</option>';
         $('#areaid').html(list);
        }//end sucess
      });//end ajax
   }


 $('.confirm').click(function(){
    if (confirm("Are you sure. You want to do this!")) {
        return true;
    } else {
        return false;
    }
 });

});

</script>
<script src="<?php echo base_url();?>backend/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>backend/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>backend/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>backend/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>backend/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>backend/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>backend/dist/js/demo.js"></script>
</body>
</html>
