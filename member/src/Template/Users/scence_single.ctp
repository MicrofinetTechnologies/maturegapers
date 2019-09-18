<?= $this->element('frontend/header'); ?>
<link rel="stylesheet" href="<?= $this->Url->css('model-Carousel.min.css'); ?>">
<script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
<script src="<?= $this->Url->script('helloVideos.js'); ?>"></script>

<style type="text/css">
    .plyr--video {
        height:100% !important;
    }
    .single-mode-box{
        float: left;
        width: 100%;
    }
    .single-mode-box {
        float: left;
        width: 100%;
        box-shadow: inset 0px 0px 62px 0px #403b3b;
        border: 1px solid #ccc;
        border-radius: 7px;
        padding: 13px;
        background: #000;
    }
    .signle-model{
        padding: 17px 15px;
    }
    .single-mode-box img {
        width: 100%;
        border: 5px solid #383838;
    }
    .single-mode-box ul {
        float: left;
        width: 100%;
        margin: 0;
        padding: 10px 0 16px;
        border-bottom: 1px solid #1d1c1c;
    }
    .single-mode-box ul li{
        display: inline-block;
        font-size: 17px;
        color: #fff;
        margin:0 20px 0 0;
    }
    .single-mode-box ul li span{
        display: inline-block;
        padding: 0 0 0 10px;
        font-weight: bold;
        color: #ed1b26;
    }
    .abot-single-model{
        float: left;
        width: 100%;
    }

    .abot-single-model h2 {
        color: #ed1b26;
        font-weight: bold;
        font-size: 24px;
        letter-spacing: 2px;
        margin: 19px 0 12px;
    }
    .abot-single-model p{
        font-size: 16px;
        color: #fff;
        margin: 0;
    }
    .single-model-sence{
        float: left;
        width: 100%;
    }
    .single-model-sence h2 {
        color: #ed1b26;
        font-weight: bold;
        font-size: 29px;
        letter-spacing: 2px;
        margin: 31px 0 16px;
        width: 100%;
        text-align: center;
    }

    .sence-box {
        float: left;
        width: 100%;
        box-shadow: inset 0 42px 55px 10px #000;
        background: #000;
        padding: 10px;
        border-radius: 5px;
        transition: 500ms all ease-in-out 0s;
        margin: 15px 0;
    }

    .sence-box .single-scence-img{
        float: left;
        width: 100%;
        overflow: hidden;
        border-bottom: 3px solid #ed1b26;
        border-radius: 5px;
    }
    .sence-box .single-scence-img img {
        width: 100%;
        border-radius: 5px;
        transition: 500ms all ease-in-out 0s;
    }
    .sence-box:hover .single-scence-img img{
        transition: 500ms all ease-in-out 0s;
        transform: scale(1.2);
    }
    .sence-box h3 {
        font-size: 19px;
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        margin: 13px 0 14px;
    }
    .sence-box:hover h3{
        color: #ff0000;
    }
    .sence-box h5 {
        font-size: 16px;
        color: #fff;
    }
    .sence-box h6 {
        color: #fff;
        font-size: 12px;
        float: left;
        width: 100%;
        padding-top: 4px;
    }
    .sence-box h6 span{
        float: right;
    }
    .sence-box h6 span img {
        width: 40px;
        margin-top: -10px;
    }
    .big-btn-1{
        font-size: 23px;
        color: #ff0000;
        margin-top: 8px;
        display: inline-block;
        text-decoration: underline;
    }
    .big-btn-1:hover{
        color: #000;
    }
    .view-model{
        float: right;
        font-size: 16px;
        background: #ff0000;
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        padding: 12px 18px;
        border-radius: 7px;
    }
    .view-model:hover{
        background: #000;
        color: #fff;
        text-decoration: none;

    }
    .thevideo2{
        width: 100%;
    }

    .single-scence-banner {
        float: left;
        width: 100%;
        background: #353333;
        padding: 15px;
    }
    .single-scence-banner .thevideo{
        width: 100%;
    }
    .single-scence-banner ul {
        float: left;
        width: 100%;
        text-align: right;
        padding: 0;
        margin: 8px 0 0 0;
    }
    .single-scence-banner .data-video li {
        display: inline-block;
        color: #fff;
        font-size: 17px;
        margin: 0 12px;
    }
    .single-scence-banner .data-video li:first-child{
        float: left;
    }
    .single-scence-banner .data-video li span {
        display: inline-block;
        padding: 0 0 0 10px;
        font-weight: bold;
        color: #ed1b26;
    }
    .gallery-box {
        float: left;
        width: 100%;
        background: #000;
        padding: 15px;
        margin-top: 12px;
    }
    .single-scence-banner h4{
        font-size: 21px;
        font-weight: bold;
        color: #ff0000;
        border-bottom: 1px solid #ff0000;
        padding-bottom: 17px;
        margin-top: 0;
    }
    .gallery-box ul{
        text-align: left;
    }
    .gallery-box ul li {
        display: inline-block;
        width: 28%;
    }
    .gallery-box ul li:last-child {
        text-align: center;
        vertical-align: middle;
    }
    .gallery-box ul li img {
        width: 100%;
    }
    .gallery-box ul li:last-child a {
        display: inline-block;
        font-size: 18px;
        background: #ff0000;
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        padding: 7px 7px;
    }
    .gallery-box ul li:last-child a:hover{
        background: #5d5d5d;
        text-decoration: none;
    }
    .Single-scence-description{
        float: left;
        width: 100%;
    }
    .Single-scence-description p{
        font-size: 16px;
        color: #fff;
        letter-spacing: 2px;
    }
    .Single-scence-description ul{
        text-align: left;
    }	
    .Single-scence-description li{
        display: inline-block;
    }
    .Single-scence-description li a {
        display: inline-block;
        background: #000;
        padding: 5px 10px;
        border-radius: 4px;
        color: #ff0000;
        font-size: 16px;
    }
    .Single-scence-description li a:hover{
        background: #ff0000;
        color: #fff;
        text-decoration: none;
    } 
    .Single-scence-description h4{   margin-top: 25px;}

    /*--gallery --*/
    .header-top {
        float: left;
        width: 100%;
        padding: 25px 0 15px;
    }
    .header-top ul {position: relative;padding: 0;margin: 0;width: 87%;height: 125px;}
    .header-top ul li {
        position: absolute;
        z-index: 1;
        height: 100%;
        width: 100%;
        border: 4px solid #f1f1f1;
        overflow: hidden;
    }
    .header-top ul li img {
        width: 100%;
        height: 208px;
    }
    .header-top h4 {
        margin-top: 30px;
        text-align: center;
        font-size: 20px;
    }
    .black-box{
        float:left;
        width:100%;
    }
</style>
<script>
    $(document).ready(function () {

        //Plyr.setup("#player");
        const player = new Plyr('#player', {
            invertTime: false,
        });
    });


</script>
<link rel="stylesheet" href="<?= $this->Url->css('dist/demo.css?v=2'); ?>">

<!--<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
<script src="https://cdn.shr.one/1.0.1/shr.js" crossorigin="anonymous"></script>
<script src="https://cdn.rangetouch.com/1.0.1/rangetouch.js" async crossorigin="anonymous"></script>-->
<script src="<?= $this->Url->script('dist/plyr.js'); ?>" crossorigin="anonymous"></script>     
<script src="<?= $this->Url->script('dist/demo.js'); ?>" crossorigin="anonymous"></script>

<?php $videodata = $this->User->scenesVideoHelper($scenesdetails->model_video); ?>
<div class="banner">
    <img class="doloshub" src="<?= $this->Url->image('dollshub.gif'); ?>" alt="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 scence-title-name">
                <h2><?= $scenesdetails->scene_name; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="single-scence-banner">
                    <div onclick="launchApp()" id="iocdee" style="position: absolute;z-index: 3333;">        
                        <div style=" float:left;" >

                            <img src="<?= $this->Url->image('images/cast_icon_idle.png'); ?>" id="casticon" width="30" >
                        </div>
                    </div>

                    <video class="thevideo2" controls crossorigin playsinline preload=""   id="player">
                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/720p_' . $scenevideo->video_file)) { ?>
                            <source src="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/720p_' . $scenevideo->video_file; ?>" type="video/mp4" size="720">
                        <?php } ?>

                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/360p_' . $scenevideo->video_file)) { ?>
                            <source src="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/360p_' . $scenevideo->video_file; ?>" type="video/mp4" size="360">
                        <?php } ?>

                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/1080p_' . $scenevideo->video_file)) { ?>
                            <source src="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/1080p_' . $scenevideo->video_file; ?>" type="video/mp4" size="1080">
                        <?php } ?>
                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/4K_' . $scenevideo->video_file)) { ?>
                            <source src="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/4K_' . $scenevideo->video_file; ?>" type="video/mp4" size="2160">
                        <?php } ?>

                        <?php if (!file_exists(REVIDEOS . $scenesdetails->id . '/4K_' . $scenevideo->video_file) && !file_exists(REVIDEOS . $scenesdetails->id . '/1080p_' . $scenevideo->video_file) && !file_exists(REVIDEOS . $scenesdetails->id . '/360p_' . $scenevideo->video_file) && !file_exists(REVIDEOS . $scenesdetails->id . '/720p_' . $scenevideo->video_file)) { ?>

                            <source src="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/' . $scenevideo->video_file; ?>" type="video/mp4" size="480">
                        <?php } ?>


<!--                        <a href="<?= HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/' . $scenevideo->video_file; ?>" type="video/mp4" download>Download</a>-->
                    </video>
                    <ul class="data-video" style="position: relative;">

                        <li>
                            <?php if ($video_download->download_video == 1) { ?>
                                <div style="position: absolute;top: -24px;left: 0;">
                                    <span style="color:#fff;">Available Downloads :</span>
                                    <span>
                                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/360p_' . $scenevideo->video_file)) { ?>
                                            <a href="<?php echo HTTP_REMOTE . 'users/videodownload/' . $scenevideo->id . '/360p_'; ?>" target="_blank">360p</a>                                    
                                        <?php } ?>
                                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/720p_' . $scenevideo->video_file)) { ?>
                                            , <a href="<?php echo HTTP_REMOTE . 'users/videodownload/' . $scenevideo->id . '/720p_'; ?>" target="_blank">720p</a>                                    
                                        <?php } ?>
                                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/1080p_' . $scenevideo->video_file)) { ?>
                                            , <a href="<?php echo HTTP_REMOTE . 'users/videodownload/' . $scenevideo->id . '/1080p_'; ?>" target="_blank">1080p</a>                                    
                                        <?php } ?>
                                        <?php if (file_exists(REVIDEOS . $scenesdetails->id . '/4K_' . $scenevideo->video_file)) { ?>
                                            , <a href="<?php echo HTTP_REMOTE . VIDEOS . $scenesdetails->id . '/4K_' . $scenevideo->video_file; ?>" target="_blank">4K</a>                                    
        <!--                                            , <a href="<?php echo HTTP_REMOTE . 'users/videodownload/' . $scenevideo->id . '/4K_'; ?>" target="_blank">4K</a>                                    -->
                                        <?php } ?>
                                    </span> 
                                </div>
                            <?php } ?>
                            Featuring: <span>
                                <?php if (!empty($scenesdetails->model1)) { ?>   
                                    <a href="<?= HTTP_ROOT . 'model-single?name=' . $this->User->modelHelper($scenesdetails->model1)->model_name . '-' . $scenesdetails->model1; ?>" target="_blank"><?= $this->User->modelHelper($scenesdetails->model1)->model_name; ?></a>
                                <?php } ?>
                                <?php if (!empty($scenesdetails->model2)) { ?>  
                                    ,<a href="<?= HTTP_ROOT . 'model-single?name=' . $this->User->modelHelper($scenesdetails->model2)->model_name . '-' . $scenesdetails->model2; ?>" target="_blank" ><?= $this->User->modelHelper($scenesdetails->model2)->model_name; ?></a>
                                <?php } ?>    
                                <?php if (!empty($scenesdetails->model3)) { ?>  
                                    ,<a href="<?= HTTP_ROOT . 'model-single?name=' . $this->User->modelHelper($scenesdetails->model3)->model_name . '-' . $scenesdetails->model3; ?>" target="_blank" ><?= $this->User->modelHelper($scenesdetails->model3)->model_name; ?></a>
                                <?php } ?>
                            </span>

                        </li>
<!--                        <li><a href="#"><i class="fas fa-download"></i> Download</a></li>-->
                        <li class="bonus-button"><?php if (!empty($this->User->chkBonusVideo($scenesdetails->id))) { ?>
                                <a class="btn btn-danger"  href="<?php echo HTTP_ROOT . 'bonus-video?scene-name='.$_GET['scene-name']; ?>" style="color: #fff;background: red;font-weight: bold;font-size: 17px;padding: 6px 20px 7px;">Bonus videos</a>
                            <?php } ?>
                        </li> 
                        <li>Length: <span><?= $scenevideo->video_durations; ?></span></li>
                        <li>Photos: <span><?= $this->User->singlescenephotos($scenesdetails->id); ?></span></li>
                    </ul>
                    <?php if($scenegallery->count() > 0){ ?>
                    <div class="gallery-box">
                        <h4>Photo Galleries</h4>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <main id="gallery">
                                    <div class="header-top">
                                        <?php foreach ($scenegallery as $gallery) {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'scene-photos/' . $scenesdetails->id . '/' . $gallery->name; ?>">

                                                <div class="col-sm-3 col-lg-3 col-md-3">
                                                    <ul>
                                                        <?php
                                                        $modelphotos1 = $this->User->scenephotos($gallery->name, $scenesdetails->id);
                                                        $deg = 19;
                                                        $cxt = 1;
                                                        foreach ($modelphotos1 as $photo) {
                                                            $cxt++;
                                                            if ($cxt <= 4) {
                                                                ?>
                                                                <li  style="transform: rotate(<?= $deg -= 12; ?>deg);max-height:120px;"><img src="<?= HTTP_REMOTE . PHOTOS . 'scenes/' . $scenesdetails->id . '/' . $gallery->name . '/' . $photo->files_name; ?>"></li>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>

                                            </a>
<?php } ?>
                                    </div>
                                </main>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                    <div class="Single-scence-description">
                        <h4>Description</h4>
                        <p><?= $scenesdetails->description; ?></p>

                        <!--<h4>Niches</h4>-->
                        <!--<ul>-->
                            <?php
                            // $alltags = explode(",", $scenevideo->tags);
                            // foreach ($alltags as $tags) {
                                ?> 
                               <!-- <li><a href="#"><?php // $tags; ?></a></li> -->
<?php// } ?>    	

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="contain-in signle-model">
        <div class="single-model-sence">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2>Video Suggestions</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="sence-boxed">
                        <ul>
                            <?php
                            //pj($scenesDetail);
                            $i = 0;
                            foreach ($allscenes as $val) {
                                ?>
                                <li>
                                    <a class="img-a" href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $val->scene_name . '-' . $val->id ?>">
                                        <div class="img-slide">
                                            <div class="img-slide-im">
                                                <div class="item2">

                                                    <?php
                                                    $img_scen = $this->User->scenecover5($val->id);
                                                    $first = "";
                                                    $ewww = 0;
                                                    foreach ($img_scen as $value) {
                                                        $ewww++;
                                                        if ($ewww == 1) {
                                                            $first = HTTP_REMOTE . PHOTOS . $value->photo_name;
                                                        }
                                                        ?>

                                                        <img src="<?= HTTP_REMOTE . PHOTOS . $value->photo_name; ?>" alt="">
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                            <span>03 SCENES</span><img src="<?php echo $first; ?>" alt=""> 
                                        </div>
                                    </a>
                                    <div class="black-box">
                                        <h4><a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $val->scene_name . '-' . $val->id ?>"><?= $val->scene_name; ?></a></h4>
                                        <h6><?php
                                            echo substr($val->description, 0, 45);
                                            echo (str_word_count($val->description) > 45) ? '...' : '';
                                            ?>
                                        </h6>
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

                                    </div>
                                </li>
<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <a class="big-btn-1" href="<?= HTTP_ROOT; ?>scenes"><span>Click Here</span> and watch all scenes <b>right now</b>!</a>
                    <a class="view-model" href="<?= HTTP_ROOT; ?>scenes">View more scenes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
<script src="<?= $this->Url->script('model-Carousel.min.js'); ?>"    crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $(".item2").brazzersCarousel();
    });

</script>
<?= $this->element('frontend/footer'); ?>