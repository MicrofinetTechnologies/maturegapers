<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-clone"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Scene</span>
                        <span class="info-box-number"><?php echo $totalSceneCount; ?></span>

                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Model </span>
                        <span class="info-box-number"><?php echo $totalModelCount; ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <a href="../../../../Debasishplugin/test-plugin/test-plugin.php"></a>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-fw fa-file-video-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Video </span>
                        <span class="info-box-number"><?php echo $totalVideoCount; ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-photo"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Photo</span>
                        <span class="info-box-number"><?php echo $totalPhoto; ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->



        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- MAP & BOX PANE -->

                <div class="row">


                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Scene</h3>
                                <div class="box-tools pull-right">

                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->reach
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    <?php
                                    foreach ($sceneLists as $lists) {
                                        $scenes_photos = $this->User->sceneprophoto($lists->id);
                                        ?>
                                        <li>
                                            <img width="100" src="<?php echo HTTP_ROOT . PHOTOS . 'scenes/' . @$lists->id . '/' . @$scenes_photos->gal_name . '/' . @$scenes_photos->files_name; ?>" alt="<?php echo @$lists->scene_name; ?>">
                                            <a class="users-list-name" href="Javascript:void(0)"><?php echo $lists->scene_name; ?></a>
                                            <span class="users-list-date"><?php echo $lists->releasedate; ?></span>
                                        </li>
                                    <?php } ?>

                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="<?php echo HTTP_ROOT . 'appadmins/scenes_list' ?>" class="uppercase">View All Scene</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div>



                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Model</h3>
                                <div class="box-tools pull-right">

                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    <?php
                                    foreach ($modelLists as $mList) {
                                        //echo $mList->model_photo->files_name; 
                                       
                                        ?>
                                        <li>
                                            <img width="70" src="<?= HTTP_ROOT . PHOTOS . $mList->cover_pic; ?>" alt="<?php echo $mList->model_name; ?>">
                                            <a class="users-list-name" href="javascript::"><?php echo $mList->release_date; ?></a>
                                            <span class="users-list-date"><?php echo $mList->model_name; ?></span>
                                        </li>
                                    <?php } ?>



                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="<?=HTTP_ROOT.'appadmins/model_setting';?>" class="uppercase">View All Model</a>
                            </div><!-- /.box-footer -->
                        </div><!--/.box -->
                    </div>
                </div><!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Members</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


<!--                            <table class="table no-margin">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Item</th>
            <th>Status</th>
            <th>Popularity</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="label label-success">Shipped</span></td>
            <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-warning">Pending</span></td>
            <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="label label-danger">Delivered</span></td>
            <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-info">Processing</span></td>
            <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR1848</a></td>
            <td>Samsung Smart TV</td>
            <td><span class="label label-warning">Pending</span></td>
            <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR7429</a></td>
            <td>iPhone 6 Plus</td>
            <td><span class="label label-danger">Delivered</span></td>
            <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
        </tr>
        <tr>
            <td><a href="pages/examples/invoice.html">OR9842</a></td>
            <td>Call of Duty IV</td>
            <td><span class="label label-success">Shipped</span></td>
            <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
        </tr>
    </tbody>
</table>-->

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>                              
                                        
                                        <th>Name</th>
                                        <th>Join Date</th>
                                        <th>Subscription end date </th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                                    <?php foreach ($dataListings as $list): ?>
                                        <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                           
                                            <td style="text-align:  left;"> <?php echo $list->name; ?></td>
                                            <td style="text-align:  left;"><?php echo $list->reg_dt; ?> </td>
                                            <td style="text-align:  left;"><?php echo $list->subscription_enddate ; ?> </td>
                                            <td style="text-align: center; width: 20%">


                                               


                                                <?php if ($list->is_subscribe == 1) { ?>
                                                    <a href="#"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                                <?php } else { ?>
                                                    <a href="#"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                                <?php } ?>
                                 
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col -->

            <!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
</div>


