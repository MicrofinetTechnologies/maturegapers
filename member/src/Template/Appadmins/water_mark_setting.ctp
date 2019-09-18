<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo "Water mark setting"
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create(@$admin, array('data-toggle' => "validator",'type'=>'file')); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputName">Watermark  <span style="color: red;">*</span></label>
                                <?= $this->Form->select('is_active', [1 => 'On', 0 => 'Off'], ['class' => "form-control", 'label' => false, 'default' => @$list->is_active]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputName">Name <span style="color: red;">*</span></label>
                                <?= $this->Form->select('postions_type', [1 => 'X-y set', 2 => 'Postions set'], ['class' => "form-control", 'label' => false, 'onchange' => 'getSet(this.value)', 'default' => @$list->postions_type]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12" id="top-style" style="display: <?php if($list->postions_type==1){?> block; <?php } else {?>None;<?php } ?>" >
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Top (Y- axis) <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('postions_top', ['placeholder' => "Postions top", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$list->postions_top, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Right (X- axis) <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('postions_bottom', ['placeholder' => "Postions bottom", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$list->postions_bottom, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
<!--                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Bottom <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('postions_left', ['placeholder' => "Postions left", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$list->postions_left, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Left <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('postions_right', ['placeholder' => "postions right ", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$list->postions_right, 'kl_virtual_keyboard_secure_input' => "on"]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>-->
                        </div>

                        <div class="col-md-12" id="label-top"  style="display: <?php if($list->postions_type==2){?> block; <?php } else {?>None;<?php } ?>"  >
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputName">Chose style <span style="color: red;">*</span></label>
                                    <?= $this->Form->select('postions_labels', [1 => 'Top-right', 2 => 'Top left', 3 => 'Down-left', 4 => 'Down-right',5=>'center'], ['class' => "form-control", 'label' => false, 'default' => @$list->postions_labels]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>


<!--                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Transparent <span style="color: red;">*</span></label>
                                    <?= $this->Form->select('transparnt', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], ['class' => "form-control", 'label' => false, 'default' => @$list->transparnt]); ?>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-md-12">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputName">Water mark image <span style="color: red;">*</span></label>
                                    <?php echo $this->Form->input('water_mark_image', array('type' => 'file')); ?> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <img src="<?php echo HTTP_ROOT.WATERMARK.@$list->water_mark_image; ?>"/>
                                    <?php echo "<br>Width : ". imagesx(imagecreatefrompng(HTTP_ROOT.WATERMARK.@$list->water_mark_image));?>
                                    <?php echo "px <br> Height : ".imagesy(imagecreatefrompng(HTTP_ROOT.WATERMARK.@$list->water_mark_image))."px";?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="box-footer">
                        <?php
                        echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
function getSet(value){
    if(value==2){
       $('#label-top').show();
       $('#top-style').hide();
    }else{
       $('#top-style').show();
       $('#label-top').hide(); 
    }
}
</script>