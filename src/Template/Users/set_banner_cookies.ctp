<?php
$scn_iid = $id;

//            if (!empty(@$_COOKIE['scene_id'])) {
//                $scn_iid = @$_COOKIE['scene_id'];
//            }

$last_scenes = $this->User->lastscenesHelper($scn_iid);

/*
  if (!empty(@$_COOKIE['section_point'])) {
  @$_COOKIE['section_point'] = "";
  @$_COOKIE['section_point'] = null;
  unset($_COOKIE['section_point']);
  setcookie('section_point', null, -1, '/');
  ?>
  <script>
  $(function () {
  $('html, body').animate({
  scrollTop: $('#second-vsection1').offset().top}, 2000);
  });
  </script>
  <?php } */
?>


<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
        <h2><a href="<?= HTTP_ROOT . 'scence-single?scene-name=' . $last_scenes['scene_name'] . '-' . $last_scenes['scene_id']; ?>"><?= $last_scenes['scene_name']; ?></a></h2>
    </div>
</div>
<div class="row">	
    <div class="col-sm-5 col-lg-5 col-md-5 video-left">
        <div class="video">

            <!--  <video controls crossorigin playsinline poster="180209-F-PM645-983.JPG" id="player">-->
            <video controls crossorigin playsinline  preload="none" id="player1">
                <!-- Video files -->
                <?php if (file_exists(VIDEOS . @$last_scenes['scene_id'] . '/720p_' . @$last_scenes['video_file'])) { ?>
                    <source src="<?php echo VIDEOS . @$last_scenes['scene_id'] . '/720p_' . @$last_scenes['video_file']; ?>" type="video/mp4" size="720">
                <?php } ?>

                <?php if (file_exists(VIDEOS . @$last_scenes['scene_id'] . '/360p_' . @$last_scenes['video_file'])) { ?>
                    <source src="<?php echo VIDEOS . @$last_scenes['scene_id'] . '/360p_' . @$last_scenes['video_file']; ?>" type="video/mp4" size="360">
                <?php } ?>

                <?php if (file_exists(VIDEOS . @$last_scenes['scene_id'] . '/1080p_' . @$last_scenes['video_file'])) { ?>
                    <source src="<?php echo VIDEOS . @$last_scenes['scene_id'] . '/1080p_' . @$last_scenes['video_file']; ?>" type="video/mp4" size="1080">
                <?php } ?>

                <?php if (file_exists(VIDEOS . @$last_scenes['scene_id'] . '/4K_' . @$last_scenes['video_file'])) { ?>
                    <source src="<?php echo VIDEOS . @$last_scenes['scene_id'] . '/4K_' . @$last_scenes['video_file']; ?>" type="video/mp4" size="2160">
                <?php } ?>

                <?php if (!file_exists(VIDEOS . @$last_scenes['scene_id'] . '/4K_' . @$last_scenes['video_file']) && !file_exists(VIDEOS . @$last_scenes['scene_id'] . '/1080p_' . @$last_scenes['video_file']) && !file_exists(VIDEOS . @$last_scenes['scene_id'] . '/720p_' . @$last_scenes['video_file']) && !file_exists(VIDEOS . @$last_scenes['scene_id'] . '/360p_' . @$last_scenes['video_file'])) { ?>
                    <source src="<?php echo VIDEOS . @$last_scenes['scene_id'] . '/' . @$last_scenes['video_file']; ?>" type="video/mp4" size="480">
                <?php } ?>

                   <!--  <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
                    <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->
                <!--<a href="Apple_2.mp4" download>Download</a>-->
            </video>
        </div>
        <div class="video-heading">
            <h4><?php if (strlen($last_scenes['description']) > 90) {
                    echo substr($last_scenes['description'], 0, 89) . "...";
                } else {
                    echo $last_scenes['description'];
                } ?></h4>
        </div>
    </div>
    <div class="col-sm-7 col-lg-7 col-md-7 video-right">
        <ul>
<?php
$scenes4photo = $this->User->scenephoto($last_scenes['scene_id']);
foreach ($scenes4photo as $valkey) {
    ?>
                <li><a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $last_scenes['scene_name'] . '-' . $last_scenes['scene_id']; ?>"><img src="<?php echo HTTP_ROOT . PHOTOS . $valkey->photo_name; ?>" alt=""></a></li> 

<?php } ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
        <div class="detail-box">
            <ul>
                <li>Starring :<span><?= $last_scenes['model_name']; ?></span></li>
                <li>Pictures :<span> <?= $last_scenes['photo_count']; ?></span></li>
                <li>Video length :<span> <?= $last_scenes['video_duration']; ?> mins</span></li>
                <li><span> 

                        <div class="video-type">
                            <?php if (!empty($this->User->scenevideo4Kcheck($last_scenes['scene_id']))) { ?>
                                <img src="<?= $this->Url->image('4k-icon.png'); ?>" alt="">
                            <?php } ?>
                            <?php if (!empty($this->User->scenevideohdcheck($last_scenes['scene_id']))) { ?>
                                <img src="<?= $this->Url->image('hd-icon.png'); ?>" alt="">
<?php } ?>
<?php if (!empty($this->User->scenevideocheck($last_scenes['scene_id'], 'Is bonus'))) { ?>
                                <span>Bonus</span>
<?php } ?>
                        </div>

                    </span></li>
            </ul>
        </div>
    </div>
</div>
<script src="<?= $this->Url->script('jq.js'); ?>"></script>
<script src="<?= $this->Url->script('dist/plyr.js'); ?>" crossorigin="anonymous"></script>     
<script src="<?= $this->Url->script('dist/demo1.js'); ?>" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {

        //Plyr.setup("#player1");
        const player = new Plyr('#player1', {
            invertTime: false,
        });
    });


</script>




