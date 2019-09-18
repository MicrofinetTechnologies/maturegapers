
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  style="color: red;font-size: 15px;" onclick="$('#ad_banner').slideToggle(500)" class="active" href="javascript:void(0);">
                    <i class="fa fa-book"></i><?php echo "Create new ad banner"; ?></a></li>
        </ol>
        <?php //echo (HTTP_ROOT);  ?>
    </section>
    <div id="ad_banner" class="box box-default"  style="<?php echo ($id) ? 'border-top: none; display: block;' : 'border-top: none; display: none;'; ?>">
        <div class="box-header with-border1">
            <h3 class="box-title">
                <?php
                if ($id) {
                    echo "Edit ad banner";
                } else {
                    echo "Create new ad banner";
                }
                ?>
            </h3>
            <div class="box-tools pull-right">
                <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform', 'type' => 'file')); ?>
                        <div class="box-body">
                            <p style="color: red;">All (*) fields are mandatory</p>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <?php
                                    
                                    
                                    
                                    if ($id) {
                                        $ad_id = $editRow->ad_id;
                                        echo $this->Form->input('id', ['type' => 'hidden', 'id' => 'id', 'value' => @$editRow->id]);
                                        $disabled = 'disabled';
                                    }else{
                                        $ad_id = $ad_id;
                                    }
                                    ?>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Select ad type <span style="color: red;">*</span></label>
                                        <?php $options = array(2 => 'Banner') ?>
                                        <?= $this->Form->select('ad_type', $options, ['class' => "form-control", 'label' => false, 'disabled' => @$disabled, 'default' => @$editRow->ad_type]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ad id <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('ad_id', ['type'=>'text','class' => "form-control", 'label' => false, 'value' =>@$ad_id, 'readonly','required' => "required", 'data-error' => 'Enter banner id', 'maxlength' => 50]); ?>
                                        
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Width <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('banner_width', ['class' => "form-control", 'label' => false,'required' => "required", 'data-error' => 'Enter banner width', 'value' => @$editRow->ad_id]); ?>
                                       
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Height <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('banner_height', ['class' => "form-control", 'label' => false, 'required' => "required", 'data-error' => 'Enter banner height','value' => @$editRow->banner_height]); ?>
                                       
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Link <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('link', ['type' => "text",'class' => "form-control", 'required' => "required", 'data-error' => 'Enter banner link','label' => false,'value' => @$editRow->link]); ?>
                                        <p style="font-size: 12px;">Note: <span>While Banner click  should goes this link</span>.</p>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Banner <span style="color: red;">*</span></label>
                                        
                                        <?php 
                                        if($id){
                                            echo  $this->Form->input('image', ['type' => "file", 'label' => false]);
                                        }else{
                                            echo  $this->Form->input('image', ['type' => "file", 'label' => false, 'required' => "required", 'data-error' => 'Enter banners',]);
                                        }
                                        
                                         ?>
                                        <p style="font-size: 12px;">Note: <span>Name should not be more than 50 char</span>.</p>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="box-footer">
                            <?= $this->Form->button('Get a code', ['class' => 'btn btn-success', 'id' => 'add', 'style' => 'margin-left:15px;']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.box-body -->

    </div>


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
                                    
                                    <th>Ad id</th>
                                    <th>Banner</th>
                                    <th>Click Count</th>
                                    <th>Created Dt.</th>
                                    <th>Link</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php
                                foreach ($bannerlisting as $banlist):
                                    //pj($banlist); 
                                    ?>
                                    <tr  id="arrayorder_<?php echo $banlist->id; ?>" class="message_box ui-sortable-handle">
                                        <td style="text-align: center;"><?php echo $banlist->ad_id; ?></td>
                                        <td> <?php if (empty($banlist->image)) { ?>
                                                <img src="<?php echo HTTP_ROOT . AD_BANNERS . 'no-image-icon.png'; ?>" width='50'/>
                                            <?php } else { ?>
                                                <img src="<?php echo HTTP_ROOT . AD_BANNERS . $banlist->image; ?>" width='50'/>
                                            <?php } ?>
                                        </td>
                                         <td style="text-align: center;"><?php echo $banlist->ad_id; ?></td>
                                         <td style="text-align: center;"><?php echo $banlist->created_dt; ?></td>
                                         <td style="text-align: center;"><?php echo $banlist->link; ?></td>
                                        <td style="text-align: center;">
                                               <a href="<?php echo HTTP_ROOT.'appadmins/get_code/'.$banlist->ad_id;?>" data-placement="top" data-hint="Add" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;">Get a code</a>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'ad_banner', $banlist->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $banlist->id, 'AdBannners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>

                                            <?php if ($banlist->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $banlist->id . '/AdBannners'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $banlist->id . '/AdBannners'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
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


