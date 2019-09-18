<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?php
   //print_r($bannerimg);
     if (isset($id)) {
      echo 'Edit Banner';
     } else {
      echo "Create Banner";
     }

   ?>
  </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a  href="<?= HTTP_ROOT; ?>appadmins/view_banner"> <i class="fa fa-list"></i>Banner List</a></li>
  </ol>
 </section>
 <!-- Main content -->
 <section class="content">
  <div class="row">
   <!-- left column -->
   <div class="col-xs-12">
    <div class="box box-primary">

     <?= $this->Form->create(null, array('data-toggle' => "validator",'enctype' => "multipart/form-data")); ?>
     <div class="box-body">
      <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
     
      <div class="col-md-6" style="margin-top: 27px;">
       <div class="form-group">
        <label for="exampleInputName">Banner Title <span style="color: red;">*</span></label>
        <?= $this->Form->input('title', ['placeholder' => "Enter banner title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editoBanner->title, 'data-error' => 'Enter title']); ?>
        <?//= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
  
       

    
      
   
      <div class="col-md-9">
       <div class="form-group">

        <label for="exampleInputEmail">Banner Description <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
        
           <?= $this->Form->textarea('description', ['placeholder' => "Enter banner description",  'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editoBanner->description, 'required' => "required", 'data-error' => 'Enter description']); ?>
         
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>
    <?php if(isset($id) && !empty($id)) {?>
        <?= $this->Form->input('id', ['value' => @$id,'type'=>'hidden','required' => "required"]); ?>
 <div class="col-md-9">
       <div class="form-group">

        <label for="exampleInputEmail">Banner <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
          <img src="<?php echo HTTP_ROOT.BANNERS.$editoBanner->image;?>" width='200'/>
        
       </div>
      </div>
    <?php } ?>

      <div class="col-md-9">
       <div class="form-group">

        <label for="exampleInputEmail">Upload Banner Image <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
       
           <?= $this->Form->input('image', ['type' =>"file", 'label' => false]); ?>
           
         
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
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
</div>