<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<div class="inner-content">
<div class="container">
<div class="contain-in">
<?php echo $pageDetails->description; ?>
</div>
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
