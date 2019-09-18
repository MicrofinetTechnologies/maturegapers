
<style>
 .login-logo {
  float: left;
  text-align: center;
  width: 100%;
 }
 .btn-primary
 {
  background-color: #b62329!important;
  border-color: #b62329 !important;
 }
 #s{
  right: 41.5%;
  top: 40px;
 }
 .submit {
  margin-top: 10px;
 }
 .submit input {
  font-weight: bold;
 }
 #e {
  right: 50%;
  transform: translateX(50%);
  -moz-transform: translateX(50%);
  -webkit-transform: translateX(50%);

 }
</style>
<div class="login-box">
 <div class="login-logo">
<!--        <img src="<?php echo HTTP_ROOT ?>img/login-logo.jpg"/>-->
 </div><!-- /.login-logo -->
 <div class="login-box-body">
  <!--        <h2 class="login-box-msg">OCMA</h2>-->
  <div class="login-logo">
   <img src="<?php echo HTTP_ROOT ?>images/logo.png"/>
  </div>
  <?php echo $this->Form->create("User", array('data-toggle' => "validator")) ?>
  <div class="form-group has-feedback">
   <?= $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'required' => 'required']) ?>
   <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
   <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'required' => 'required']) ?>
   <div class="help-block with-errors"></div>
  </div>
  <div class="row">
   <!-- /.col -->
   <div class="col-xs-4">
    <?= $this->Form->submit('LOGIN', ['type' => 'submit', 'class' => 'btn btn-block btn-primary btn-flat login']) ?>
   </div><!-- /.col -->
  </div>
  <?php echo $this->Form->end(); ?>
<!--        <a href="<?php echo HTTP_ROOT . 'forgot-password' ?>">I forgot my password</a>-->
 </div><!-- /.login-box-body -->
</div>