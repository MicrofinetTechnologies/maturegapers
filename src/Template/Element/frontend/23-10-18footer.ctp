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
                        <li><a href="#">PRIVACY POLICY</a></li>
                        <li><a href="#">CONTENT</a></li>
                        <li><a href="#">CONTACT US</a></li>
                        <li><a href="#">WEBMASTERS</a></li>
                        <li><a href="#">BILLING SUPPORT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="boxes">
    <div style="top: 50%; left: 50%; display: none;" id="dialog" class="window"> 
        <div id="san">
            <a href="#" class="close agree"><i class="fa fa-times fa-2x"></i></a>
            <div class="css-only-modal">
                <label for="modal1" class="css-only-modal-close"></label>
                <p>Try us out securely with Paypal <b>NOW!</b></p>
                <img src="<?=HTTP_ROOT;?>images/card.png" alt="">
            </div>
        </div>
    </div>
    <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>
</div>