<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?= __('Profile Setting') ?>
  </h1>
  <?php if ($type == 1) { ?>
     <ol class="breadcrumb">
      <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

     </ol>
    <?php } else { ?>

     <ol class="breadcrumb">
      <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

     </ol>

    <?php } ?>
 </section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">


    <div class="box box-primary">
     <?= $this->Form->create($user, array('id' => 'profile_data', 'data-toggle' => "validator")) ?>
     <div class="box-body">
      <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
      <div class="col-md-6" style="width: 47%;margin-top: 27px;">
       <div class="form-group">
        <label for="exampleInputPassword1">Name<span style="color:#FF0000">*</span></label>
        <?= $this->Form->input('name', ['value' => $row->name, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Enter your name', 'label' => false]); ?>
        <div class="help-block with-errors"></div>
       </div>
      </div>
      <div class="col-md-6" style="width: 47%;">
       <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <?= $this->Form->input('email', ['value' => $row['email'], 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your email', 'onblur' => 'checkAdminEmailAvail(this.value)']); ?>
        <span style="font-size: 12px;font-weight: normal;color:#f84b4b" id="email_validation_msg"></span>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
        <div class="help-block with-errors"></div>
       </div>
      </div>

     </div>
     <div class="box-footer">
      <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
     </div>

     <?= $this->Form->end() ?>
     <div class="box-footer">
      <section class="content-header">
       <h1>
        <?= __('Change Password'); ?>
       </h1>

      </section>
     </div>
     <?= $this->Form->create(@$passwordData, array('data-toggle' => "validator", 'id' => 'change_password')); ?>
     <div class="box-body">
      <div class="col-md-6" style="width: 100%;">
       <div class="form-group">
        <label for="exampleInputEmail">Current Password<span style="color:#FF0000">*</span></label>
        <?= $this->Form->input('current_password', ['type' => 'password', 'style' => 'width:47%;', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your current password']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>
      <div class="col-md-6" style="width: 100%;">
       <div class="form-group">
        <label for="exampleInputEmail">Password<span style="color:#FF0000">*</span></span></label>
        <?= $this->Form->input('password', ['class' => "form-control", 'style' => 'width:47%;', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your  password']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>
      <div class="col-md-6" style="width: 100%;">
       <div class="form-group">
        <label for="exampleInputEmail">Confirm Password<span style="color:#FF0000">*</span></label>
        <?= $this->Form->input('cpassword', ['type' => 'password', 'style' => 'width:47%;', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your confirm password']); ?>
        <div class="help-block with-errors"></div>
        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
       </div>
      </div>


     </div>
     <div class="box-footer">
      <?= $this->Form->submit('Change password', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'changepassword', 'style' => 'margin-left:15px;']) ?>
     </div>
     <?= $this->Form->end() ?>
    </div>

   </div>
 </section>
</div>

