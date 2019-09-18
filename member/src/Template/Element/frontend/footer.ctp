<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 support-icon">
                <!--<ul>
                    <li><i class="fab fa-windows"></i></li>
                    <li><i class="fab fa-android"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fas fa-file-archive"></i></li>
                </ul>-->
                <ul>
                <?php echo $this->cell('Action::footer_social'); ?>
            </ul>
            </div>
        </div>
        <div class="row">
            <?php echo $this->cell('Action::footer_content'); ?>
           <!--  <div class="col-sm-3 col-lg-3 col-md-3">
                <a href="#"><img src="images/logo-2.png" alt=""></a>
            </div>
            <div class="col-sm-9 col-lg-9 col-md-9">
                <p>Copyright ? 2018 MatureGapers.com All rights are reserved.All models appearing on this website are 18 years or older. 18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement</p>
            </div> -->
        </div>
    </div>
    <div class="footer-last">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <ul>
                        <li><a href="<?php echo HTTP_ROOT ?>users/privacy-policy">PRIVACY POLICY</a></li>
                        <li><a href="<?php echo HTTP_ROOT ?>users/content">CONTENT</a></li>
                        <li><a href="<?php echo HTTP_ROOT ?>users/contact-us">CONTACT US</a></li>
                        <li><a href="<?php echo HTTP_ROOT ?>users/web-master">WEBMASTERS</a></li>
                        <li><a href="http://www.epoch.com">BILLING SUPPORT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php 
    if($paymentwidget->visible == 1){
?>
<!--
    <div style="top: 50%; left: 50%; display: none;" id="dialog" class="window"> 
    <div id="boxes">
        <div id="san">
            <a id="close-box" href="#" class="close agree"><i class="fa fa-times fa-2x"></i></a>
            <div class="css-only-modal">
                <p><?php //$paymentwidget->change_text;?></p>
                <img src="<?=HTTP_ROOT;?>images/card.png" alt="">
            </div>
        </div>
    </div>

</div>

    <style>
    .css-only-modal {
    height: 100px;
    border-color : <?=$paymentwidget->border_color;?>;
    border-radius: 5px;
    position: absolute;
    width: 100%;
    background: none;
    bottom: 8px;
}  
    #boxes{
        opacity : <?=isset($paymentwidget->opacity)?($paymentwidget->opacity/10):0;?>;
        height : <?=$paymentwidget->height;?>px;
        width : <?=$paymentwidget->width;?>px;
    }
    #dialog,#san{
        height : <?=$paymentwidget->height;?>px;
        width : <?=$paymentwidget->width;?>px;
        background-color : <?=$paymentwidget->inner_color;?>; 
        
    }
    .css-only-modal p {
        color : <?=$paymentwidget->text_color;?>;
    }
    #dialog, #san {
    border-radius: 5px;
    height: 100% !important;
    width: 100% !important;
}
</style>
-->
<script type="text/javascript">
$(document).ready(function(){
  $(".lab").click(function(){
    $(".phone-search-box").toggleClass("active");
    $("#search_text_mod").focus();
  });
});
</script>
<?php } ?>
