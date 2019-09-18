<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<link rel="stylesheet" href="<?= $this->Url->css('model-Carousel.min.css'); ?>">
<div class="contain-section">
    <div class="container">
        <div class="contain-in">
            <div class="our-page-box">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h2>Our Sites</h2>
                    </div>
                </div>
                <div class="row oursite-main">
                    <?php foreach ($datas as $data) { ?>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="site-box">
                                <div class="site-box-right">
                                <a class="site_logo" target="_balnk" href="<?php echo $data->link; ?>">
                                        <img width="170" src="<?php echo HTTP_REMOTE . OURSITES . $data->logo; ?>" alt="<?php echo $data->link; ?>">
                                    </a> 
                                    <ul>
                                        <?php if (in_array('Full HD', explode(",", @$data->video_quality))) { ?>
                                            <li><img src="<?php echo HTTP_ROOT ?>img/4k-icon.png" alt=""></li>
                                        <?php }
                                        ?>
                                        <?php if (in_array('4K', explode(",", @$data->video_quality))) { ?>
                                            <li><img src="<?php echo HTTP_ROOT ?>img/hd-icon.png" alt=""></li>
                                        <?php } ?>
                                        <?php if (in_array('Bonus', explode(",", @$data->video_quality))) { ?>
                                            <li><span>Bonus</span></li>
                                        <?php } ?>
                                    </ul>

                                    <div class="img-slide">
                                        <div class="item2">
                                            <?php
                                            foreach ($data['our_sites_photos'] as $dataPhoto) {
                                                $photo = $dataPhoto->file_name;
                                                ?>
                                                <img src="<?php echo HTTP_ROOT . OURSITES . $dataPhoto->file_name; ?>" alt="<?php echo $dataPhoto->file_name; ?>">

                                            <?php } ?>
                                        </div>

                                        <a class="img-a" target="_blank" href="<?php echo $data->link; ?>">
                                            <img src="<?php echo HTTP_ROOT . OURSITES . $photo; ?>" alt="">
                                        </a>

                                    </div>

												<p><?php echo $data->descriptions; ?></p>
                                </div>
                                <a class="view-sence" target="_blank" href="<?php echo $data->link; ?>">Visit This Website</a>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </div>


            <?php echo $this->cell('Action::middle_advertise'); ?>

        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <img class="insta-img" src="<?php echo HTTP_ROOT ?>images/bgd3.png">
                <div class="instant-box">
                    <!-- <h3>Want to see more?</h3>
                    <a href="<?php echo HTTP_ROOT . 'joinus';?>">Instant Access</a> -->
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->cell('Action::left_advertise'); ?>
</div>

<?= $this->element('frontend/footer'); ?>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
<script src="<?= $this->Url->script('model-Carousel.min.js'); ?>"    crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $(".item2").brazzersCarousel();
    });

</script>