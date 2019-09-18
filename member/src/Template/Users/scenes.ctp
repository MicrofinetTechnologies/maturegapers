<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<link rel="stylesheet" href="<?= $this->Url->css('model-Carousel.min.css'); ?>">
<div class="contain-section">
    <div class="container">
        <div class="contain-in">
            <div class="model-box">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h2>Scene Index</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="sence-boxed">
                            <ul>
                                <?php
                                //pj($scenesDetail);
                                $i = 0;
                                foreach ($scenesDetail as $val) {
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
                                                <span>03 SCENES</span>
                                                <img src="<?php echo $first; ?>" alt="">
                                            </div>
                                        </a>
                                        <div class="black-box">
                                            <h4><a href="<?php echo HTTP_ROOT . 'scence-single?scene-name=' . $val->scene_name . '-' . $val->id ?>"><?= $val->scene_name; ?></a></h4>
                                            <h6><?php echo substr($val->description, 0, 45);
                                                    echo (str_word_count($val->description) > 45) ? '...' : ''; ?></h6>
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
            </div>
            <div class="col-sm-12 col-lg-12 col-md-12">
                <?php
                echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;'>";
                echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                echo "</div></ul>";
                ?>
            </div>

<?php echo $this->cell('Action::middle_advertise'); ?>

        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <img class="insta-img" src="<?php echo HTTP_ROOT ?>images/bgd3.png">
                <div class="instant-box">
                    <!-- <h3>Want to see more?</h3>
                    <a href="<?php echo HTTP_ROOT . 'joinus'; ?>">Instant Access</a> -->
                </div>
            </div>
        </div>
    </div>
<?php echo $this->cell('Action::left_advertise'); ?>
</div>

<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=es6,Array.prototype.includes,CustomEvent,Object.entries,Object.values,URL"    crossorigin="anonymous"></script>
<script src="<?= $this->Url->script('model-Carousel.min.js'); ?>"    crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        $(".item2").brazzersCarousel();
    });

</script>
<?= $this->element('frontend/footer'); ?>
