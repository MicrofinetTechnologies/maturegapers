<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<style>
 .inner-content h2 { font-size: 25px;
font-weight: 700;
color: #ff0000;
text-align: center;
}
.inner-content h3 {
color: #005dff;
margin-left:10px;
}
.inner-content p{
    text-align: left;
}
 .inner-content span{
    text-align: left;
}
</style>

<div class="inner-content">
<div class="container">
<?php echo $pageDetails->description; ?>
</div>
</div>
<?= $this->element('frontend/footer'); ?>
<script type="text/javascript">
var figure = $(".video").hover( hoverVideo, hideVideo );
function hoverVideo(e) {  
    $('video', this).get(0).play(); 
}

function hideVideo(e) {
    $('video', this).get(0).pause(); 
}
</script>
<script>
jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() >= 40) {
       jQuery('.fixrd-menu').addClass('fixed-header');
    }
    else {
       jQuery('.fixrd-menu').removeClass('fixed-header');
    }
});
</script>