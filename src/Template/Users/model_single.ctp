<?= $this->element('frontend/header'); ?>
<style type="text/css">
    .single-mode-box{
        float: left;
        width: 100%;
    }
    .single-mode-box {
        float: left;
        width: 100%;
        box-shadow: inset 0px 0px 62px 0px #403b3b;
        border: 1px solid #020200;
        border-radius: 7px;
        padding: 13px;
        background: #000;
        margin-top: 17px;
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
    .abot-single-model {
        float: left;
        width: 100%;
        margin-top: 20px;
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
    .single-scence-banner h2 {
        font-size: 21px;
        font-weight: bold;
        color: #ff0000;
        border-bottom: 1px solid #ff0000;
        padding-bottom: 17px;
        margin-top: 0;
    }
    .single-model-sence h2 a{
        float: right;
        font-size: 16px;
        background: #ff0000;
        color: #fff;
        font-weight: bold;
        letter-spacing: 2px;
        padding: 12px 18px;
        border-radius: 7px;
    }
    .single-model-sence h2 a:hover {
        background: #000;
        color: #fff;
        text-decoration: none;
    }

    .sence-box {
        float: left;
        width: 100%;
        box-shadow: inset 0 42px 55px 10px #000;
        background: #000;
        padding: 2px;
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


    .single-scence-banner {
        float: left;
        width: 100%;
        background: #353333;
        padding: 15px;
    }
    .gallery-box {
        float: left;
        width: 100%;
        background: #000;
        padding: 15px;
        margin-top: 12px;
    }

    /*---Gllery */
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
    #gallery .header-top ul li img{width:100%; height:135px;}
    .header-top h4 {
        margin-top: 30px;
        text-align: center;
        font-size: 20px;
    }
    .black-box2{
        float:left;
        width:100%;
        height:130px;
    }
    .button-section {
        float: left;
        width: 100%;
        margin-top: 11px;
    }

    .button-section h2 {
        color: #ed1b26;
        font-weight: bold;
        font-size: 21px;
        letter-spacing: 2px;
        margin: 19px 0 12px;
        border: none;
        padding-bottom: 3px;
    }
    .button-section ul {
        border: none;
        border-top: 1px solid #ff0000;
        padding-top: 17px;
        padding-bottom: 0;
    }
    .button-section ul li{
        margin: 0 7px 0 0;
    }
    .button-section ul li a {
        display: inline-block;
        background: #ff0000;
        color: #fff;
        padding: 6px 14px;
        border-radius: 5px;
        font-size: 14px;
    }
    .button-section ul li a:hover{ background: #b70000; text-decoration: none;}
</style>

<div class="banner">
    <img class="doloshub" src="<?= $this->Url->image('dollshub.gif'); ?>" alt="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 join-banner">
                <div class="single-scence-banner">
                <!--<img src="<?= HTTP_ROOT . PHOTOS . $modeldetails->id . '/' . $modelBanner->files_name; ?>" alt="">-->
                    <div class="row">	
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="single-mode-box">
                                <div class="row">
                                    <div class="col-sm-3 col-lg-3 col-md-3">
                                        <img src="<?= HTTP_ROOT . PHOTOS . $modeldetails->cover_pic; ?>" alt="">
                                    </div>
                                    <div class="col-sm-9 col-lg-9 col-md-9">
                                        <ul>	
                                            <li>Year of birth: <span> <?= date_format(date_create($modeldetails->birth_date),'Y'); ?> </span></li>
                                            <li>Height:<span><?= $modeldetails->height; ?></span></li>
                                            <li>Hair Color: <span><?= $modeldetails->hair; ?></span></li>
                                            <li>Weight: <span><?= $modeldetails->weight; ?></span></li>
                                            <li>scenes: <span><?= $modelscenescount; ?></span></li>
                                        </ul>
                                        <div class="abot-single-model">
                                            <h2>About <?= $modeldetails->model_name; ?></h2>
                                            <p><?= $modeldetails->model_about; ?></p>
                                        </div>
                                        <?php if(!empty($modelgallery->count())){ ?>
										<div class="single-model-sence gallery-box single-model-sence-mobile">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <h2 style="text-align: left;"><?= $modeldetails->model_name; ?> Galleries</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <main id="gallery">
                                    <div class="header-top">
                                        <?php foreach ($modelgallery as $gallery) {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'model-photos/' . $modeldetails->id . '/' . $gallery->name; ?>">


                                                <div class="col-sm-3 col-lg-3 col-md-3">
                                                    <ul>
                                                        <?php
                                                        $modelphotos1 = $this->User->modelphotos($gallery->name, $modeldetails->id);
                                                        $deg = 19;
                                                        $cxt = 1;
                                                        foreach ($modelphotos1 as $photo) {
                                                            $cxt++;
                                                            if ($cxt <= 4) {
                                                                ?>
                                                                <li  style="transform: rotate(<?= $deg -= 12; ?>deg);max-height:120px;"><img src="<?= HTTP_ROOT . PHOTOS . $modeldetails->id . '/' . $gallery->name . '/' . $photo->files_name; ?>"></li>
                                                            <?php }
                                                        } ?>
                                                    </ul>
                                                </div>					


                                            </a>
                                            <?php }
                                        ?>
                                    </div>  
                                </main>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                                        <div class="button-section">
                                            <?php  if($modelUrl->count() != 0){ ?>
                                            <h2> <?= $modeldetails->model_name; ?> can be seen also here</h2>
                                            <ul>
                                                <?php foreach($modelUrl as $urlm){?>
                                                <?php if($urlm->urlname){?>
                                                <li><a target="_blank" href="<?php echo $urlm->url?>"><?php echo $urlm->urlname?></a></li>
                                                
                                                <?php } ?>
                                                <?php } ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($modelgallery->count())){ ?>
                    <div class="single-model-sence gallery-box single-model-sence-desktop">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <h2 style="text-align: left;">Free <?= $modeldetails->model_name; ?> photo galleries</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <main id="gallery">
                                    <div class="header-top">
                                        <?php foreach ($modelgallery as $gallery) {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'model-photos/' . $modeldetails->id . '/' . $gallery->name; ?>">


                                                <div class="col-sm-3 col-lg-3 col-md-3">
                                                    <ul>
                                                        <?php
                                                        $modelphotos1 = $this->User->modelphotos($gallery->name, $modeldetails->id);
                                                        $deg = 19;
                                                        $cxt = 1;
                                                        foreach ($modelphotos1 as $photo) {
                                                            $cxt++;
                                                            if ($cxt <= 4) {
                                                                ?>
                                                                <li  style="transform: rotate(<?= $deg -= 12; ?>deg);max-height:120px;"><img src="<?= HTTP_ROOT . PHOTOS . $modeldetails->id . '/' . $gallery->name . '/' . $photo->files_name; ?>"></li>
                                                            <?php }
                                                        } ?>
                                                    </ul>
                                                </div>					


                                            </a>
                                            <?php }
                                        ?>
                                    </div>  
                                </main>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
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
			<h2 style="color: #ff0000; font-weight: bold;"><?= $modeldetails->model_name; ?> Videos</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($modelscenes as $scnval) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="sence-box">
                            <div class="single-scence-img">
                               <a href="<?= HTTP_ROOT . 'scence-single/?scene-name=' . $scnval->scene_name . '-' . $scnval->id; ?>"> <img src="<?= HTTP_ROOT . PHOTOS . $this->User->scenesngphoto($scnval->id)->photo_name; ?>" alt=""></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="black-box2">
                                <h3><a href="<?= HTTP_ROOT . 'scence-single?scene-name=' . $scnval->scene_name . '-' . $scnval->id; ?>"><?= $scnval->scene_name; ?></a></h3>
                                <h5>
                                    <a href="<?php echo HTTP_ROOT . 'model-single?name=' . $modeldetails->model_name . '-' . $modeldetails->id ?>"><?= $modeldetails->model_name; ?></a>
                                    <div class="video-type">
                                        <?php if (!empty($this->User->scenevideo4Kcheck($scnval->id))) { ?>
                                            <img src="<?= $this->Url->image('4k-icon.png'); ?>" alt="">
                                        <?php } ?>
                                        <?php if (!empty($this->User->scenevideohdcheck($scnval->id))) { ?>
                                            <img src="<?= $this->Url->image('hd-icon.png'); ?>" alt="">
                                        <?php } ?>

                                    </div>
                                </h5>
                                <h6 <?php if (empty($this->User->scenevideocheck($scnval->id, 'Is bonus'))) { ?>
                                        class="add-date"
                                    <?php } ?>>Added: <?= date('dS-M-Y', strtotime($modeldetails->release_date)); ?>
                                    <?php if (!empty($this->User->scenevideocheck($scnval->id, 'Is bonus'))) { ?>
                                        <span>Bonus</span>
                                    <?php } ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <a class="big-btn-1" href="<?= HTTP_ROOT; ?>joinus"><span>Click Here</span> and watch all scenes <b>right now</b>!</a>
                    <a class="view-model" href="<?= HTTP_ROOT; ?>models">View more models</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('frontend/footer'); ?>
