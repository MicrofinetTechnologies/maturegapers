<?php
//pj($siteDetails);
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
<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
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

        <link rel="stylesheet" href="<?php echo HTTP_REMOTE . 'frontend/css/' . $stylecss ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_REMOTE . 'frontend/css/main-style.css' ?>" type="text/css">

        <link rel="stylesheet" href="<?php echo HTTP_REMOTE . 'frontend/' ?>css/animate.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" crossorigin="anonymous">
        <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<!--          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<!--        <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>-->
        <script src="<?= $this->Url->script('jq.js'); ?>"></script>

        <script>
            $(document).ready(function () {
                $('#s').delay(5000).fadeOut('slow');
                $('#e').delay(5000).fadeOut('slow');
            });
        </script>
        
    </head>
    <body data-scrolling-animations="true">


        <?= $this->Flash->render() ?>
        <?= $this->fetch('content'); ?>



        <script src="<?php echo HTTP_REMOTE . 'frontend/' ?>js/wow.min.js"></script>
        <script src="<?php echo HTTP_REMOTE . 'frontend/' ?>js/swc.js"></script>

        <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
        <script  src="<?php echo HTTP_REMOTE . 'frontend/' ?>js/one_slider.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js'></script>
        <script  src="<?php echo HTTP_REMOTE . 'frontend/' ?>js/index.js"></script>
        <script  src="<?php echo HTTP_REMOTE . 'frontend/' ?>js/analytics.js"></script>
        <script type="text/javascript">
            var figure = $(".video").hover(hoverVideo, hideVideo);

            function hoverVideo(e) {
                $('video', this).get(0).play();
            }

            function hideVideo(e) {
                $('video', this).get(0).pause();
            }
        </script>    







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