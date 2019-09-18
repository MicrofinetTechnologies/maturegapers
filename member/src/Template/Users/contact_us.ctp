<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
   .inner-content h2 { font-size: 25px;
font-weight: 700;
color: #ff0000;
text-align: center;
}
.inner-content p{
    text-align: center;
}
 .inner-content form{width: 85%;
margin: 0 auto;
}
</style>


<div class="inner-content">
<div class="container">
<div class="contain-in">
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12 contact-heading">
					<h2>Support</h2>
					<p>If you have any question or suggestion please don't hesitate to contact us.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12">
					<?= $this->Form->create('form', array('data-toggle' => "validator", 'id' => 'frm_id','url'=>'/users/contact-us')); ?>
						<label>Name</label>
						<?= $this->Form->input('name', ['class' => "form-control", 'label' => false,'data-error' => 'Please Enter Name', 'required' => "required", 'maxlength' => 35,'id'=>'name']); ?>
						<label>Email</label>
						<?= $this->Form->input('email', ['type'=>'email','class' => "form-control", 'label' => false,'data-error' => 'Please Enter Email', 'required' => "required", 'maxlength' => 35,'id'=>'email']); ?>
						<label>Subject</label>
                        <?= $this->Form->input('subject', ['type'=>'text','class' => "form-control", 'label' => false,'data-error' => 'Please Enter Subject', 'required' => "required",'id'=>'subject']); ?>
						<label>Phone No</label>
						<?= $this->Form->input('phone', ['type'=>'text','class' => "form-control", 'label' => false,'data-error' => 'Please Enter Phone No.', 'required' => "required", 'maxlength' => 10,'id'=>'phone']); ?>
						<label>Message</label>
						<?= $this->Form->input('message', ['type'=>'textarea','class' => "form-control", 'label' => false,'data-error' => 'Please Enter Message', 'required' => "required",'id'=>'message']); ?>
                        <div class="form-group" style="position:relative;">
                        <div class="g-recaptcha" data-sitekey="6Ld8OYoUAAAAAPXO7BA-unZffagghlFqLGlsjihd"></div>
                        	<input type="submit" value="Send" class="btn btn-success" style="float:right; position:absolute; top:15px; top:15px; padding:15px; width:100px; right:0px;"> 
                        </div>
					<?= $this->Form->end() ?>
				</div>
			</div>
</div>
</div>
</div>


<?= $this->element('frontend/footer'); ?>

