<?php
if (isset($skincolor->color)) {
    if (file_exists("frontend/css/" . $skincolor->color . ".css")) {
        $stylecss = $skincolor->color . ".css";
    } else {
        $stylecss = "style.css";
    }
} else {
    $stylecss = "style.css";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo!empty($meta_title) ? $meta_title : SITE_NAME; ?></title>
        <link rel="icon" type="image/<?= explode(".", $siteDetails->icon)[1]; ?>" sizes="16x16" href="<?php echo HTTP_ROOT . SOCIAL_ICON . '/' . $siteDetails->icon; ?>">
        <?php echo $this->Html->meta('keywords', (empty($meta_keyword) ? '' : $meta_keyword)); ?>
        <?php echo $this->Html->meta('description', (empty($meta_description) ? '' : $meta_description)); ?>

        <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'frontend/css/' . $stylecss ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'frontend/css/main-style.css' ?>" type="text/css">

        <link rel="stylesheet" href="<?php echo HTTP_ROOT . 'frontend/' ?>css/animate.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" crossorigin="anonymous">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<!--          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<!--        <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>-->
        <script src="<?=$this->Url->script('jq.js');?>"></script>

        <script>
            $(document).ready(function () {
                $('#s').delay(5000).fadeOut('slow');
                $('#e').delay(5000).fadeOut('slow');
            });
        </script>
      <style type="text/css">
          .header-main .menu-2 ul li a:hover {
            color: <?=$skincolor->hovor_color;?>;
           }
            .right-top form {
                border-color: <?=$skincolor->border_color;?>;
            }

.header-main .right-top ul li:nth-child(2) a {
    background: <?=$skincolor->member;?> url(../../images/lock.png) 15px center no-repeat;
}
.header-main .right-top ul li:nth-child(3) a {
    background: <?=$skincolor->login;?> url(../../images/join.png) 15px center no-repeat;
}
.banner-bottom ul li{
    background: <?=$skincolor->card;?>;
}
.ih-item.circle.effect3 .info {
    background: <?=$skincolor->bg_color;?>;
}
.banner-bottom ul li .text-box h4{
    color: <?=$skincolor->text_color;?>;
}
.banner-bottom ul li:hover h4{
    color: <?=$skincolor->hovor_color;?>;
}
.contain-first h2 a {
    color: <?=$skincolor->text_color;?>;
}
.contain-first h2 a:hover {
    color: <?=$skincolor->hovor_color;?>;
}
.detail-box ul {
    background: <?=$skincolor->bg_color;?>;
}
.logo-contain-text h3{
    color: <?=$skincolor->text_color;?>;
}
.logo-contain-text p{
    color: <?=$skincolor->text_color;?>;
}
.white-bg {
    border-color: <?=$skincolor->border_color;?>;
}
.white-bg ul li:first-child a {
    background: <?=$skincolor->bg_color;?>;
}
.white-bg ul li:last-child a {
    background: <?=$skincolor->bg_color;?>;
}

.instant-box a:hover {
    background: <?=$skincolor->background_hover_color;?>;
    color: <?=$skincolor->hovor_color;?>;
}
.footer-last ul li a:hover{
    color: <?=$skincolor->hovor_color;?>;
}

.detail-box ul li{
    border-color:<?=$skincolor->border_color;?>; 
}
.sence-boxed ul li{
   background: <?=$skincolor->bg_color;?>;
   border-color:<?=$skincolor->border_color;?>; 
}
.sence-boxed ul li:hover, .sence-boxed ul li:hover a.img-a{
    background: <?=$skincolor->background_hover_color;?>;
}
.model-box h2{
    color: <?=$skincolor->text_color;?>;
}
.mdel-boxed ul li a{
    color: <?=$skincolor->text_color;?>;
}
.mdel-boxed ul li a:hover{
    color: <?=$skincolor->hovor_color;?>;
    text-decoration: none;
}
.model-box ul li,.right-box-join button{
    border-color:<?=$skincolor->border_color;?>; 
}
.our-page-box h2{
   color: <?=$skincolor->text_color;?>; 
}
.site-box .view-sence,.right-box-join button{
    background: <?=$skincolor->bg_color;?>;
}
.site-box .view-sence:hover{
    background: <?=$skincolor->background_hover_color;?>;
}
.left-box-join .join-ic{
    border-color:<?=$skincolor->border_color;?>; 
}
.left-box-join .join-ic h3,.right-box-join .choose,.right-box-join label h3 span{
   color: <?=$skincolor->text_color;?>;  
}
.left-box-join .join-ic span{
    border-color:<?=$skincolor->border_color;?>;
    color: <?=$skincolor->text_color;?>; 
}
.right-box-join ul li input[type="radio"]:checked + label h3 span{
    color: #fff;
}
.right-box-join button:hover{
    background: none;
    color: #ff0000;
    color: <?=$skincolor->hovor_color;?>;
}
.right-box-join button{
    background: <?=$skincolor->bg_color;?> !important;
}
.pagination{
    margin: 0;
}
.sence-boxed ul li,.Searh-section .model-box ul li {
    background:<?=$skincolor->bg_color;?> !important;
}
.sence-boxed ul li:hover,.Searh-section .model-box ul li:hover {
    background:<?=$skincolor->background_hover_color;?> !important;
}
.sence-boxed ul li h4 a{
  color: <?=$skincolor->text_color;?>; 
}
.sence-boxed ul li h4 a:hover{
    color: <?=$skincolor->hovor_color;?>;
}
.header-main,.fixed-header{
    background: <?=$skincolor->nav_color;?>;
}
.footer:after {
    background: <?=$skincolor->footer_top_bg;?>;
    opacity: 0.9;
}
.footer-last{
    background: <?=$skincolor->footer_last;?>;
}
body{
   background: <?=$skincolor->body_bg;?> !important; 
}
.banner-bottom{
   background: <?=$skincolor->content_middle;?> !important;  
}
.contain-in{
   background: <?=$skincolor->content_main_middle;?> !important;  
}



      </style>
    </head>
    <body data-scrolling-animations="true">


        <?= $this->Flash->render() ?>
        <?= $this->fetch('content'); ?>



        <script src="<?php echo HTTP_ROOT . 'frontend/' ?>js/wow.min.js"></script>
        <script src="<?php echo HTTP_ROOT . 'frontend/' ?>js/swc.js"></script>

        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
        <script  src="<?php echo HTTP_ROOT . 'frontend/' ?>js/one_slider.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js'></script>
        <script  src="<?php echo HTTP_ROOT . 'frontend/' ?>js/index.js"></script>
        <script  src="<?php echo HTTP_ROOT . 'frontend/' ?>js/analytics.js"></script>
           
        <script>
            jQuery(window).scroll(function () {
                if (jQuery(window).scrollTop() >= 40) {
                    jQuery('.fixrd-menu').addClass('fixed-header');
                } else {
                    jQuery('.fixrd-menu').removeClass('fixed-header');
                }
            });


        </script>
        <!--<script type="text/javascript">
        var parent = $('#boxes');
    var child = $('.css-only-modal');
 
 child.css("position","absolute");
child.css("width","100%");
    child.css("top", ((parent.height() - child.outerHeight()) / 2) + parent.scrollTop() + "px");
</script>-->

    </body>
</html>