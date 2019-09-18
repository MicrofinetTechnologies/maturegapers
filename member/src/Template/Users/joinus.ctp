<?= $this->element('frontend/header'); ?>

<div class="banner">
<img class="doloshub" src="<?=$this->Url->image('dollshub.gif');?>" alt="">
<div class="container">
<div class="row">
<div class="col-sm-12 col-lg-12 col-md-12 join-banner">
<img src="<?=$this->Url->image('joinus-banner.jpg');?>" alt="">
</div>
</div>
</div>
</div>


<div class="contain-section contain-section-join">
	<div class="container">
		<div class="contain-in">
		<div class="join-us-box">
		<div class="row">
        		<div class="col-sm-12 col-lg-12 col-md-12">
        			<h2>Our Scenes Page</h2>
        		</div>
        </div>
         <?=$this->Form->create(null,array('type'=>'post'));?>
        <div class="row">
        		<div class="col-sm-6 col-lg-6 col-md-6 left-box-join">
        			<img class="best-offer" src="<?=$this->Url->image('best_offer.png');?>" alt="">
        			<h3>Create Your Account</h3>
                               
                                <label>E-mail:</label> <span id="err" style="display:none;color:red;"></span>
                                <input type="text" id="email" name="email" placeholder="Email address" onkeyup="return emailcheck(this)" >
        			<label>Password:</label><span id="err_pwd" style="display:none;color:red;"></span>
                                <input type="password" id="password" name="password" placeholder="Password" >
                                
                
                                
        			<h3>Create Your Account</h3>
					<label for="radioa" class="input-control radio">
  						<input type="radio" id="radioa" name="payment_method" value="CreditCard" checked>
  						<span class="input-control__indicator"></span>Credit Card
					</label>

					<label for="radioc" class="input-control radio">
  						<input type="radio" id="radioc" name="payment_method" value="EUoptions">
  						<span class="input-control__indicator"></span>EU options
					</label>
					<p>Discreet billing with no adult references appearing on statements</p>
        		</div>
        		<div class="col-sm-6 col-lg-6 col-md-6 right-box-join">
					<h3 class="choose">Choose Your Membership Plan</h3>
					<ul>
                                            <?php $counter=0; foreach ($membership as $val){ ?>
						<li>
                                                    <input class="radio-box" <?= $counter++ ==1?"checked":"";?> type="radio" name="membership" value="<?= $val->id; ?>" id="<?=$val->id;?>">
                                                    <label for="<?=$val->id;?>">
                                                        <h3><?=$val->duration;?> months membership<span>Billed in one payment of $<?=$val->m_price;?></span></h3>
                                                        <h4>$<?=$val->m_price;?><span>/<?=$val->duration;?> month</span></h4>
                                                    </label>
						</li>
                                            <?php } ?>
					</ul>
                                        <button type="submit">Get Full Access</button>
        		</div>
        </div>
        
        <div class="row">
    		<div class="col-sm-12 col-lg-12 col-md-12 infrmatio-box">
    			 	<ul>
    			 		<li><img src="<?=$this->Url->image('logo-2.png');?>" alt="" style="width: 100px;">Secure & Confidential</li>
						<li><img src="<?=$this->Url->image('safe.png');?>" alt="">All transactions are 100% safe and discreet !</li>
						<li><img src="<?=$this->Url->image('lock2.png');?>" alt="" style="width: 44px;">You will be redirected to our secure gateway</li>
    			 	</ul>
    		</div>
    	</div>
        <?=$this->Form->end();?>
        </div>
        
        
        <?php echo $this->cell('Action::middle_advertise'); ?>
        
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <img class="insta-img" src="<?php echo HTTP_ROOT?>images/bgd3.png">
                <div class="instant-box">
                    <h3>Want to see more?</h3>
                    <a href="#">Instant Access</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->cell('Action::left_advertise'); ?>
</div>

<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
    <script src="https://cdn.shr.one/1.0.1/shr.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rangetouch.com/1.0.1/rangetouch.js" async crossorigin="anonymous"></script>
    <script src="<?=$this->Url->script('dist/plyr.js');?>" crossorigin="anonymous"></script>     
    <script src="<?=$this->Url->script('dist/demo.js');?>" crossorigin="anonymous"></script>
<?= $this->element('frontend/footer'); ?>
    
<script>
    var check =0;
function emailcheck(email){
    var eml = email.value;
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    
    if(pattern.test(eml) == false){
        $('#err').show();
        $('#err').attr('style','color:red;');
        $('#err').html("Enter your Email Address");
        $('#err').html("Enter a valid Email address.");
        return false;
    }else if(pattern.test(eml) == true){
        $('#err').hide();
        jQuery.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>" + "users/emailvalidate",
                dataType: 'json',
                data: {email: eml},
                success: function (res) {
                    
                    if(res.status == "error"){
                        $('#err').show();
                        $('#err').removeAttr('style');
                        $('#err').attr('style','color:red;');
                        $('#err').html(res.message); 
                        email.value="";
                        return false;
                    }
                    if(res.status == "success"){
                        $('#err').show();
                        $('#err').removeAttr('style');
                        $('#err').attr('style','color:green;');
                        $('#err').html(res.message); 
                        check=1;
                        return true;
                    }                   
                }
            });
    }
}

$(document).on("submit", "form", function(e){    
    var email = $('#email').val();
    var password = $('#password').val();
    if(email == ""){
        $('#err').show();
        $('#err').removeAttr('style');
        $('#err').attr('style','color:red;');
        $('#err').html("Enter your Email Address");
        return  false;
    }$('#err').hide();
    if(password == ""){
        $('#err_pwd').show();
        $('#err_pwd').removeAttr('style');
        $('#err_pwd').attr('style','color:red;');
        $('#err_pwd').html("Enter your Password");
        return  false;
    }$('#err_pwd').hide();
    return true;
});
</script>