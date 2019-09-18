<?= $this->element('frontend/header'); ?>
<style>
    /*************************Satart Search ****************************/
    .Searh-section{
        Padding-top: 0;
    }
    .search-heading {
        padding: 0 20px 19PX;
        float: left;
        width: 100%;
        border-bottom: 4px solid #d8d7d7;
    }
    .search-heading h2{
        float: left;
        margin: 23px 0 0px;
    }
    .search-heading h2 span{
        font-style: italic;
        color: #000;
    }
    .search-heading a {
        float: right;
        background: #ff0000;
        color: #fff;
        font-weight: bold;
        letter-spacing: 1px;
        padding: 9px 22px;
        border-radius: 4px;
        font-size: 18px;
        margin-top: 22px;
    }
    .search-heading a:hover{
        background: #000;
        text-decoration: none;
    }
.Searh-section .mdel-boxed ul li h4 {
    float: left;
    width: 100%;
    margin-bottom: 2px;
    color: #337ab7;
    margin-top: -0;
}
    .Searh-section .mdel-boxed ul li h5 {
        color: #ff0000;
        font-weight: bold;
        font-size: 16px;
        letter-spacing: 1px;
        margin: 0;
    }
    .Searh-section .mdel-boxed ul li h6 a {
        display: inline-block;
        background: #252525;
        color: #fff;
        padding: 2px 7px;
        border-radius: 2px;
        margin-right: 5px;
    }
    .Searh-section .mdel-boxed ul li h6 a:hover{
        background: #ff0000;
        text-decoration: none;
    }
    .porn-star {
        float: left;
        width: 100%;
        padding: 0 21px;
    }
    .star-box {
        display: inline-block;
        border: 4px solid #ccc;
        position: relative;
        cursor: pointer;
        transition: 500ms all ease-in-out 0s;
        margin-top: 25px;
    }
    .star-box img{
        width: 100%;
    }

    .star-box h5 {
        position: absolute;
        opacity: 0;
        background: rgba(0, 0, 0, 0.62);
        color: #fff;
        width: 100%;
        text-align: center;
        left: 0;
        bottom: 40%;
        transition: 500ms all ease-in-out 0s;
        padding: 8px 0;
        font-size: 16px;
        letter-spacing: 1px;
        font-weight: bold;
    }    
    .star-box:hover{
        border: 4px solid #ff0000;
    }
    .star-box:hover h5{
        opacity: 1;
        transition: 500ms all ease-in-out 0s;
    }
    .star-box h5:hover{
        background: rgba(255, 0, 0, 0.62);
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="<?= $this->Url->css('model-Carousel.min.css'); ?>">
<script src="<?= $this->Url->script('model-Carousel.min.js'); ?>"></script>
<script>

    $(document).ready(function () {
        $(".item2").brazzersCarousel();
    });

</script>

<div class="contain-section Searh-section">
    <div class="container">
        <div class="contain-in">
            <div class="model-box">
                
                <?php if ($modelscount > 0) { ?>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="search-heading">
                                <h2>Pornstars-<span><?= $modelscount; ?></span></h2>
                                <a href="<?= HTTP_ROOT . 'models'; ?>">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="porn-star">
                        <div class="row">
                            <?php foreach ($models as $vals) {
                                ?>
                                <div class="col-sm-3 col-lg-3 col-md-3">
                                    <div class="star-box">
                                        <a href="<?= HTTP_ROOT . 'model-single?name=' . $vals->model_name . '-' . $vals->id; ?>">
                                        <img src="<?= HTTP_ROOT . PHOTOS . $vals->cover_pic; ?>" alt="">
                                        <h5><?= $vals->model_name; ?></h5>
                                    </a>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>  
                
                <?php if ($scenescount > 0) { ?>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="search-heading">
                                <h2>Scenes-<span><?= $scenescount; ?></span></h2>
                                <a href="<?= HTTP_ROOT . 'scenes'; ?>">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="mdel-boxed">
                                <ul>
                                    <?php foreach ($scenes as $val) { ?>
                                        <li>
                                            <a href="<?= HTTP_ROOT . 'scence-single?scene-name=' . $val->scene_name . '-' . $val->id; ?>">
                                            <div class="img-slide">
                                                <div class="item2">
                                                    <?php
                                                    $Simg = $this->User->scenecover5($val->id);
                                                    $xic = 1;
                                                    foreach ($Simg as $imgs) {
                                                        if ($xic == 1) {
                                                            $aimg = $imgs->photo_name;
                                                            $xic++;
                                                        }
                                                        ?>
                                                        <img src="<?= HTTP_ROOT . PHOTOS . $imgs->photo_name; ?>" alt="">  
        <?php } ?>

                                                </div>
                                                <a class="img-a" href="<?= HTTP_ROOT . 'scence-single?scene-name=' . $val->scene_name . '-' . $val->id; ?>"><img src="<?= HTTP_ROOT . PHOTOS . $aimg; ?>" alt=""> </a>
                                            </div>

                                            <h4><?= $val->scene_name; ?></h4>
                                            <!-- <div class="video-type-left-search">
                                            <h5>
                                                <a href="<?= HTTP_ROOT . 'model-single?name=' . $this->User->modelHelper($val->model1)->model_name . '-' . $val->model1; ?>"> <?= $this->User->modelHelper($val->model1)->model_name; ?> </a>
                                            </h5>
                                            <p><?= $val->releasedate->format('d M, Y'); ?></p>
                                        </div> -->
                                                <div class="video-type">
                                                    <?php if (!empty($this->User->scenevideo4Kcheck($val->id))) { ?>
                                                        <img src="<?= $this->Url->image('4k-icon.png'); ?>" alt="">
                                                    <?php } ?>
                                                    <?php if (!empty($this->User->scenevideohdcheck($val->id))) { ?>
                                                        <img src="<?= $this->Url->image('hd-icon.png'); ?>" alt="">
                                                    <?php } ?>
                                                    <?php if (!empty($this->User->scenevideocheck($val->id, 'Is bonus'))) { ?>
                                                        <span>Bonus</span>
        <?php } ?>
                                                </div>
                                                <!--                                                    <div class="like-counter">
                                                                                                                <span><i class="far fa-thumbs-up"></i> 12</span>
                                                                                                                <span><i class="far fa-thumbs-down"></i> 30</span>
                                                                                                    </div>-->
                                        </a>
                                        </li>
    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>   
     
            </div>


            <?php echo $this->cell('Action::middle_advertise'); ?>

        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <img class="insta-img" src="images/bgd3.png">
                <div class="instant-box">
                    <h3>Want to see more?</h3>
                    <a href="#">Instant Access</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->cell('Action::left_advertise'); ?>
</div>

<?= $this->element('frontend/footer'); ?>



<style>
    .video-type span {
        color: white;
        display: inline-block;
        background: -moz-linear-gradient(top, rgba(255,0,0,0) 0%, rgba(255,0,0,0.8) 15%, rgba(255,0,0,1) 19%, rgba(255,0,0,1) 20%, rgba(191,0,0,1) 50%, rgba(142,0,0,1) 80%, rgba(142,0,0,1) 81%, rgba(142,0,0,0.8) 85%, rgba(142,0,0,0) 100%);
        background: -webkit-linear-gradient(top, rgba(255,0,0,0) 0%,rgba(255,0,0,0.8) 15%,rgba(255,0,0,1) 19%,rgba(255,0,0,1) 20%,rgba(191,0,0,1) 50%,rgba(142,0,0,1) 80%,rgba(142,0,0,1) 81%,rgba(142,0,0,0.8) 85%,rgba(142,0,0,0) 100%);
        background: linear-gradient(to bottom, rgba(255,0,0,0) 0%,rgba(255,0,0,0.8) 15%,rgba(255,0,0,1) 19%,rgba(255,0,0,1) 20%,rgba(191,0,0,1) 50%,rgba(142,0,0,1) 80%,rgba(142,0,0,1) 81%,rgba(142,0,0,0.8) 85%,rgba(142,0,0,0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ff0000', endColorstr='#008e0000',GradientType=0 );
        padding: 6px 8px;
        float: right;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 1px;
        margin-top: 4px;
        margin-right: 2px;
    }
</style>