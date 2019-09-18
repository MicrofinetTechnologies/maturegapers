<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<link rel="stylesheet" href="<?= $this->Url->css('dist/demo.css?v=2'); ?>">
<?php
$first_scenes = $this->User->topscenesHelper();
?>

<div class="contain-section">
    <div class="container">
        <div class="contain-in">
            <div class="contain-first">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h2><a href="<?= HTTP_ROOT . 'scence-single?scene-name=' . $first_scenes['scene_name'] . '-' . $first_scenes['scene_id']; ?>"><?= $first_scenes['scene_name']; ?></a></h2>
                    </div>
                </div>

                <div class="row">	
                    <div class="col-sm-5 col-lg-5 col-md-5 video-left">
                        <div class="video">

                            <!--  <video controls crossorigin playsinline poster="180209-F-PM645-983.JPG" id="player">-->
                            <video controls crossorigin playsinline  id="player">
                                <!-- Video files -->
                                <source src="<?php echo VIDEOS . $first_scenes['scene_id'] . '/' . @$first_scenes['video_file']; ?>" type="video/mp4" size="720">
                                <source src="<?php echo VIDEOS . $first_scenes['scene_id'] . '/' . @$first_scenes['video_file']; ?>" type="video/mp4" size="480">
                                <source src="<?php echo VIDEOS . $first_scenes['scene_id'] . '/' . @$first_scenes['video_file']; ?>" type="video/mp4" size="2160">
                                <source src="<?php echo VIDEOS . $first_scenes['scene_id'] . '/' . @$first_scenes['video_file']; ?>" type="video/mp4" size="1080">

                   <!--  <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
                    <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->
                                <!--<a href="Apple_2.mp4" download>Download</a>-->
                            </video>
                        </div>
                        <!--  <div class="video-heading">
                            <h4><?= $first_scenes['model_about']; ?></h4>
                        </div>-->
                    </div>
                    <div class="col-sm-7 col-lg-7 col-md-7 video-right">
                        <ul>
                            <?php
                            $scenes4photo = $this->User->scenephoto($first_scenes['scene_id']);
                            foreach ($scenes4photo as $valkey) {
                                ?>
                                <li><a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $first_scenes['scene_name'] . '-' . $first_scenes['scene_id']; ?>"><img src="<?php echo HTTP_ROOT . PHOTOS . $valkey->photo_name; ?>" alt=""></a></li> 

                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="detail-box">
                            <ul>
                                <li>Starring :<span><?= $first_scenes['model_name']; ?></span></li>
                                <li>Pictures :<span> <?= $first_scenes['photo_count']; ?></span></li>
                                <li>Video length :<span> <?= $first_scenes['video_duration']; ?> mins</span></li>
                                <li><span> 
                                        <div class="video-type">
                                            <?php if (!empty($this->User->scenevideo4Kcheck($first_scenes['scene_id']))) { ?>
                                                <img src="<?= $this->Url->image('4k-icon.png'); ?>" alt="">
                                            <?php } ?>
                                            <?php if (!empty($this->User->scenevideohdcheck($first_scenes['scene_id']))) { ?>
                                                <img src="<?= $this->Url->image('hd-icon.png'); ?>" alt="">
                                            <?php } ?>
                                            <?php if (!empty($this->User->scenevideocheck($first_scenes['scene_id'], 'Is bonus'))) { ?>
                                                <span>Bonus</span>
                                            <?php } ?>
                                        </div>

                                    </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-logo-section">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="logo-contain">
                            <a href="#"><img src="<?php echo HTTP_ROOT . SOCIAL_ICON . '/' . $siteDetails->logo; ?>" alt="logo"></a>
                            <a class="down" href="<?= HTTP_ROOT; ?>joinus"><i class="fas fa-cloud-download-alt"></i> Enter HERE</a>
                        </div>
                        <div class="logo-contain-text">
                            <h3><?= $homecms->header; ?></h3>
                            <p><?= $homecms->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-middle">
                <div class="carousel carousel-showmanymoveone slide" id="carousel123">
                    <div class="carousel-inner"> 
                        <?php
                        $i = 1;
                        foreach ($scenesDetails as $sceneslist) {
                            $scenes_photos = $this->User->sceneprophoto($sceneslist->id);
                            //pj(HTTP_ROOT.PHOTOS.'scenes/'.$sceneslist->id.'/'.$scenes_photos->gal_name.'/thumb_'.$scenes_photos->files_name);
                            ?>
                            <div class="item <?= ($i == 1) ? 'active' : ''; ?>" >
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="ind-sce-list">

<!--                                        <a href="<?php //echo HTTP_ROOT . 'users/setBannerCookie/' . $sceneslist->id . '/second-vsection1' ?>"><img src="<?php //echo HTTP_ROOT . PHOTOS . $this->User->scenesngphoto($sceneslist->id)->photo_name; ?>" class="img-responsive"></a>-->
                                        <img src="<?php echo HTTP_ROOT . PHOTOS . $this->User->scenesngphoto($sceneslist->id)->photo_name; ?>" class="img-responsive" onclick="getsceneid(<?=$sceneslist->id;?>)">
                                        
                                    </div>
                                    <div class="white-bg">
                                        <h5><a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $sceneslist->scene_name . '-' . $sceneslist->id ?>"><?= $sceneslist->scene_name; ?></a></h5>
                                        <h6><?= date('d/M/y', strtotime($sceneslist->releasedate)); ?></h6>
                                        <ul>
                                            <?php if (!empty($this->User->scenevideo4Kcheck($sceneslist->id))) { ?>
                                                <li>
                                                    <a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $sceneslist->scene_name . '-' . $sceneslist->id ?>">4k</a>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($this->User->scenevideohdcheck($sceneslist->id))) { ?>
                                                <li>
                                                    <a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $sceneslist->scene_name . '-' . $sceneslist->id ?>">hd</a>
                                                </li>
                                            <?php } ?>

                                            <?php if (!empty($this->User->scenevideocheck($sceneslist->id, 'Is bonus'))) { ?>
                                                <li>
                                                    <a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $sceneslist->scene_name . '-' . $sceneslist->id ?>"><span>Bonus</span></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>


                    </div>
                    <a class="left carousel-control" href="#carousel123" data-slide="prev"><img src="images/prev.png" alt=""></a>
                    <a class="right carousel-control" href="#carousel123" data-slide="next"><img src="images/next.png" alt=""></a>
                </div>
            </div>
            <?php echo $this->cell('Action::middle_advertise'); ?>

            <script>
                $(document).ready(function () {
                     jQuery.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>" + "users/setBannerCookies/"+id,
                dataType: 'html',
                data: {id: ""},
                success: function(res) {
                     $("#second-vsection1").html(res);
                }
            });
                });
            function getsceneid(id){
                alert(id);
                jQuery.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>" + "users/setBannerCookies/"+id,
                dataType: 'html',
                data: {id: id},
                success: function(res) {
                     $("#second-vsection1").html(res);
                }
            });
               
                
            }
            </script>
            
            <div class="contain-first second-vsection" id="second-vsection1">
           
            </div>
            
        </div>
        
        
        
        
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <img class="insta-img" src="<?php echo HTTP_ROOT ?>images/bgd3.png">
                <div class="instant-box">
                    <h3>Want to see more?</h3>
                    <a href="#">Instant Access</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->cell('Action::left_advertise'); ?>
</div>
<!--<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
    <script src="https://cdn.shr.one/1.0.1/shr.js" crossorigin="anonymous"></script>
    <script src="https://cdn.rangetouch.com/1.0.1/rangetouch.js" async crossorigin="anonymous"></script>-->
<script src="<?= $this->Url->script('dist/plyr.js'); ?>" crossorigin="anonymous"></script>     
<script src="<?= $this->Url->script('dist/demo.js'); ?>" crossorigin="anonymous"></script>
<script src="<?= $this->Url->script('dist/demo1.js'); ?>" crossorigin="anonymous"></script>
<?= $this->element('frontend/footer'); ?>
