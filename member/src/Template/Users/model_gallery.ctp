<?= $this->element('frontend/header'); ?>

<link rel="stylesheet" href="<?= HTTP_REMOTE . 'css/macy.css'; ?>" type="text/css">
<link rel="stylesheet" href="<?= HTTP_REMOTE . 'css/lightbox.css'; ?>" type="text/css">

<script  src="<?= HTTP_REMOTE . 'js/lightbox-plus-jquery.min.js'; ?>"></script>
<script  src="<?= HTTP_REMOTE . 'js/macy.js'; ?>"></script>

<style type="text/css">
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
        margin-top: 20px;
    }
    .abot-single-model h2 {
        font-size: 21px;
        font-weight: bold;
        color: #ff0000;
        border-bottom: 1px solid #ff0000;
        padding-bottom: 17px;
        margin-top: 0;
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
        text-align: left;
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
        position: relative;
        top: -5px;
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
    .button-section {
        float: left;
        width: 100%;
        margin-top: 11px;
    }
    .button-section h2{
        color: #ed1b26;
        font-weight: bold;
        font-size: 21px;
        letter-spacing: 2px;
        margin: 19px 0 12px;
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
    .button-section ul li a:hover{ 
        background: #b70000; 
        text-decoration: none;
    }
    .demo-image:hover {
        opacity: 0.8;
    }
    .pagination li a {
    color: #2c2929c2 !important;
}
</style>

<div class="banner">
    <img class="doloshub" src="<?= $this->Url->image('dollshub.gif'); ?>" alt="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12 join-banner">
            <!--<img src="<? // HTTP_ROOT . PHOTOS . $modeldetails->id . '/medium_' . $modelBanner->files_name;   ?>" alt="">-->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="contain-in signle-model">
        <div class="row">	
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="single-mode-box">
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 col-md-3">
                            <a href="<?php echo HTTP_ROOT.'model-single?name='.$modeldetails->model_name.'-'.$modeldetails->id?>">
                                <img src="<?= HTTP_REMOTE . PHOTOS . $modeldetails->cover_pic; ?>" alt="">
                            </a>
                        </div>
                        <div class="col-sm-9 col-lg-9 col-md-9">
                            <ul>	
                                <li>Age: <span><?= $modeldetails->age; ?></span></li>
                                <li>Height:<span><?= $modeldetails->height; ?></span></li>
                                <li>Hair Color: <span><?= $modeldetails->hair; ?></span></li>
                                <li>Weight: <span><?= $modeldetails->weight; ?></span></li>
                                <li>Scence: <span><?= $modelscenescount; ?></span></li>
                            </ul>
                            <div class="abot-single-model">
                                <h2>About <?= $modeldetails->model_name; ?></h2>
                                <p><?= $modeldetails->model_about; ?></p>
                            </div>
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
        <div class="single-model-sence">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2><?= $modeldetails->model_name; ?> Photos
                        <?php if ($download->download == 1) { ?>
                            <a href="<?= HTTP_REMOTE . 'users/downloadAction/' . $id . '/' . $gallery_name; ?>">Download the gallery in ZIP</a>
                        <?php } ?>
                    </h2>
					<a class="seen-also-here" href="#">Model can be seen also here</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <main class="main" role="main">
                        <section class="section">
                            <div class="container">

                                <div id="macy-container">

                                    <?php foreach ($modelallphotos as $phot) { ?>
                                        <div class="demo">

                                            <a class="example-image-link" href="<?= HTTP_REMOTE . PHOTOS . $phot->model_id . '/' . $gallery_name . '/' . $phot->files_name; ?>" data-lightbox="example-set">

                                                <img src="<?= HTTP_REMOTE . PHOTOS . $phot->model_id . '/' . $gallery_name . '/' . $phot->files_name; ?>" alt="" class="demo-image example-image">

                                            </a>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <?php
                    echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;'>";
                    echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                    echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                    echo "</div></ul>";
                    ?>
                        </section>
                        
                    </main>
                </div>
            </div>

        </div>	
    </div>
</div>

<script>
    var masonry = new Macy({
        container: '#macy-container',
        trueOrder: false,
        waitForImages: false,
        useOwnImageLoader: false,
        debug: true,
        mobileFirst: true,
        columns: 1,
        margin: 24,
        breakAt: {
            1200: 5,
            940: 4,
            520: 3,
            400: 2
        }
    });
</script>

<?= $this->element('frontend/footer'); ?>
