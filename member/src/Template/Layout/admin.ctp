<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <?php //$this->Html->meta('icon') ?>
  <link rel="icon" type="image/<?= explode(".", $siteDetails->icon)[1];?>" sizes="16x16" href="<?php echo HTTP_ROOT.SOCIAL_ICON.'/'.$siteDetails->icon; ?>">
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.skinNice.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/bootstrap-slider/slider.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo HTTP_ROOT; ?>css/datepicker.css">
  <link href= "<?php echo HTTP_ROOT; ?>css/style.css" rel="stylesheet">
  <link href= "<?php echo HTTP_ROOT; ?>css/hint.css" rel="stylesheet">
  <script src="<?php echo HTTP_ROOT; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script>var pageurl = "<?=HTTP_ROOT;?>"</script>
  
 </head>
 <body class="hold-transition skin-blue sidebar-mini">
  <?= $this->Flash->render() ?>
  <div class="wrapper">
   <?php echo $this->element('admin_header'); ?>
   <?php echo $this->element('admin_sidebar'); ?>
   <?= $this->fetch('content') ?>
   <?php echo $this->element('admin_footer'); ?>
  </div>
     <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
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
                <a href="javascript::;">
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
                <a href="javascript::;">
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
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

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
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside>
  <?php echo $this->Html->script(array('validator.min', 'common')); ?>
  <script src="<?php echo HTTP_ROOT; ?>bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>dist/js/app.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/fastclick/fastclick.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/chartjs/Chart.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>dist/js/demo.js"></script>
  <!--<script src="<?php echo HTTP_ROOT; ?>dist/js/pages/dashboard2.js"></script>-->
  <script src="<?php echo HTTP_ROOT; ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/ionslider/ion.rangeSlider.min.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/bootstrap-slider/bootstrap-slider.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>plugins/timepicker/bootstrap-timepicker.js"></script>
  <script src="<?php echo HTTP_ROOT; ?>js/bootstrap-datepicker.js"></script>
<!--        <script src="<?php echo HTTP_ROOT; ?>plugins/iCheck/icheck.min.js"></script>-->
 </body>
</html>
<script>
 $(function () {
  $("#example1").DataTable();
  $('#example2').DataTable({
   "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": true,
   "info": true,
   "autoWidth": false
  });

  //iCheck for checkbox and radio inputs
//        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//            checkboxClass: 'icheckbox_minimal-blue',
//            radioClass: 'iradio_minimal-blue'
//        });
 });
</script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
<!--<script>
    var jq = $.noConflict();
    jq(document).ready(function($) {
        jq('#dob').datepicker({dateFormat: 'yy-mm-dd'});
        jq('#from').datepicker({dateFormat: 'yy-mm-dd'});
        jq('#to').datepicker({dateFormat: "yy-mm-dd"});
        jq('#billing').datepicker({dateFormat: "yy-mm-dd"});

    });


        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

</script>-->

<script>
 $(document).ready(function () {
//  $(".timepicker").timepicker({
//   showInputs: false
//  });



  $('.timepicker').timepicker({showInputs: false, timePickerIncrement: 15, format: 'h:mm'});








  $('.slider').slider();
  /* ION SLIDER */
  $("#range_5").ionRangeSlider({
   min: 0,
   max: 300,
   type: 'single',
   step: 0.1,
   postfix: " Minutes",
   prettify: false,
   hasGrid: true
  });
 });
 $('.datepicker').datepicker()


</script>

