<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/bannerOrder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<div class="content-wrapper">
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= (HTTP_ROOT) ?>appadmins/setting_banner">   <i class="fa  fa-user-plus"></i> Banner Setting </a></li>
        </ol>
        <?php //echo (HTTP_ROOT); ?>
    </section>

    <section class="content">
        <h3> Create slider banner </h3>
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create(null, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

                        <!--      <div class="col-md-6" style="margin-top: 27px;">
                               <div class="form-group">
                                <label for="exampleInputName">Banner Title <span style="color: red;">*</span></label>
                        <?= $this->Form->input('title', ['placeholder' => "Enter banner title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editoBanner->title, 'data-error' => 'Enter title']); ?>
                        <? //= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                               </div>
                              </div>-->






                        <!--      <div class="col-md-9">
                               <div class="form-group">
                        
                                <label for="exampleInputEmail">Banner Description <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                
                        <?= $this->Form->textarea('description', ['placeholder' => "Enter banner description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editoBanner->description, 'required' => "required", 'data-error' => 'Enter description']); ?>
                                 
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                               </div>
                              </div>-->
                        <?php if (isset($id) && !empty($id)) { ?>
                            <?= $this->Form->input('id', ['value' => @$id, 'type' => 'hidden', 'required' => "required"]); ?>
                            <div class="col-md-9">
                                <div class="form-group">

                                    <label for="exampleInputEmail">Banner <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                    <img src="<?php echo HTTP_ROOT . BANNERS . $editoBanner->image; ?>" width='200'/>

                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-12">
                            <div class="form-group">

                                <label for="exampleInputEmail">Upload Banner Image <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                <?= $this->Form->input('image', ['type' => "file", 'label' => false]); ?>

                                <small class='text-danger'>Width 1360px and height 640px</small>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Chose Scene <span style="color:#FF0000">*</span></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->select('scene_id', $allscene, ['class' => "form-control", 'label' => false, 'default' => @$editoBanner->scene_id]); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                        

                    </div>
                    <div class="box-footer">

                        <?php
                        if (isset($id)) {
                            echo $this->Form->button('Update Banner', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        } else {
                            echo $this->Form->button('Create Banner', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        }
                        ?>
                    </div>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
         <h3> Sliding Banner Listing </h3>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                        <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
<?php
foreach ($bannerlisting as $banlist):
    //pj($banlist); 
    ?>
                                    <tr  id="arrayorder_<?php echo $banlist->id; ?>" class="message_box ui-sortable-handle">
                                        <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
                                        <td> <?php if (empty($banlist->image)) { ?>
                                                <img src="<?php echo HTTP_ROOT . BANNERS . 'no-image-icon.png'; ?>" width='50'/>
                                            <?php } else { ?>
                                                <img src="<?php echo HTTP_ROOT . BANNERS . $banlist->image; ?>" width='50'/>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align: center;">
<!--                                            <a href="<?=HTTP_ROOT . 'appadmins/subBanner/'.$banlist->id;?>" data-placement="top" data-hint="Add" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;">Add Model Banner</a>-->
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'view_banner', $banlist->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete_banner', $banlist->id, 'Banners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>

                                            <?php if ($banlist->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $banlist->id . '/Banners'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $banlist->id . '/Banners'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
</div>


