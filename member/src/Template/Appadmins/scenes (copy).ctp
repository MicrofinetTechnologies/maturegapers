<div class="content-wrapper">
 <section class="content-header">
   <?php  echo " <h1>Add Scene</h1> "; ?>
  
  <ol class="breadcrumb">
   <!--<li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active"><a  href="<?= HTTP_ROOT; ?>appadmins/view_banner"> <i class="fa fa-list"></i>Banner List</a></li>-->
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

      <div class="col-md-9" style="margin-top: 27px;">
       <div class="form-group">
        <label for="exampleInputName">Scene Name <span style="color: red;">*</span></label>
        <?= $this->Form->input('scene_name', ['placeholder' => "Enter scene name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required",'data-error' => 'Enter Name']); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
     
      <div class="col-md-9">
       <div class="form-group">
        <label for="exampleInputName">Set Scene Timing <span style="color: red;">*</span></label>
        <select id="time_show" class = "form-control" name="time_show"> 
          <option value="Mid night(12 AM - 4 AM)">Mid night(12 AM - 4 AM)</option>
          <option value="Morning(4 AM - 9 AM)">Morning(4 AM - 9 AM)</option>
          <option value="9 AM - 1 PM">9 AM - 1 PM</option>
          <option value="1 PM - 6 PM">1 PM - 6 PM</option>
          <option value="6 PM - 12 AM">6 PM - 12 AM</option>
        </select>
      
        <div class="help-block with-errors"></div>
       </div>
      </div>

   

      
     </div>
     <div class="box-footer">

      <?php       
         echo $this->Form->button('Add Scene', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
      ?>
     </div>
     <?= $this->Form->end() ?>
    </div>
   </div>
  </div>
 </section>
</div>