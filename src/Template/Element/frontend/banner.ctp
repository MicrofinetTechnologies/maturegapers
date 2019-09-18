<div class="banner">
    <ul class="socila-box">
        <?php foreach($media as $vals){ ?>
        <li onclick="window.location = '<?=$vals->link;?>'"><a href="javascript:void(0);"><?=$vals->image;?></a></li>
        <?php } ?>
    </ul>
    <img class="doloshub" src="<?php echo HTTP_ROOT ?>images/dollshub.gif" alt="" onclick="window.open('http://dollshub.com/', '_blank');">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <section class="jk-slider">
                    <div id="carousel-example" class="carousel <?= ($BANNER_SETTING_DATA->slidemove=="YES")?'slide':'';?>" <?= ($BANNER_SETTING_DATA->autoplay=="YES")?'data-ride="carousel"':''; ?>  <?= (!empty($BANNER_SETTING_DATA->speed))?'data-interval="'.$BANNER_SETTING_DATA->speed.'"':''; ?>  <?= ($BANNER_SETTING_DATA->loopplay=="NO")?'data-wrap="false"':''; ?> >

                        <div class="carousel-inner">

                            <?php
                            $count = 1;
                            foreach ($banners as $banner) {
                                ?>

                                <div class="item <?php if ($count == 1) { ?>active <?php } ?>">
    <!--                                    <a href="<?php //echo HTTP_ROOT.'users/setBannerCookie/'.$banner->scene_id; ?>"><img src="<?php //echo HTTP_ROOT . BANNERS . $banner->image  ?>" /></a>-->
                                    <a href="#second-vsection1"><img src="<?php echo HTTP_ROOT . BANNERS . $banner->image ?>" onclick="getsceneid(<?= $banner->scene_id; ?>)"/></a>                                    
                                </div>
    <?php $count++;
} ?>


                        </div>

                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        <div class="fuck-wedget">
                            <div class="row">
                                <?php
                                $subbanner_miniature_pic = 0;
                                foreach ($this->User->banner_widget() as $subbanner) {
                                    // pj($subbanner->image);
                                    if ($subbanner->miniature_pic != "" && $subbanner_miniature_pic <=4) {
                                        ?>
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="ih-item circle effect3 top_to_bottom wow slideInLeft" data-wow-delay="0.3s">
                                                <a href="<?= HTTP_ROOT . 'model-single?name=' . $subbanner->model_name . '-' . $subbanner->id; ?>">
                                                    <div class="img"><img src="<?php echo HTTP_ROOT . PHOTOS . $subbanner->miniature_pic; ?>" alt="img"></div>
                                                    <div class="info">
                                                        <h3><?= $subbanner->model_name; ?></h3>
                                                        <p><?php //$subbanner->description; ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                        $subbanner_miniature_pic++;
                                    }
                                }
                                ?>

                                <!--                                            <div class="col-sm-3 col-lg-3 col-md-3">
                                                                                <div class="ih-item circle effect3 top_to_bottom wow slideInUp" data-wow-delay="0.3s"><a href="http://gudh.github.io/ihover/dist/index.html#">
                                                                                        <div class="img"><img src="<?php echo HTTP_ROOT ?>images/wedget2.jpg" alt="img"></div>
                                                                                        <div class="info">
                                                                                            <h3>Heading here</h3>
                                                                                            <p>Description goes here</p>
                                                                                        </div></a></div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3 col-md-3">
                                                                                <div class="ih-item circle effect3 top_to_bottom wow slideInDown" data-wow-delay="0.3s"><a href="http://gudh.github.io/ihover/dist/index.html#">
                                                                                        <div class="img"><img src="<?php echo HTTP_ROOT ?>images/wedget3.jpg" alt="img"></div>
                                                                                        <div class="info">
                                                                                            <h3>Heading here</h3>
                                                                                            <p>Description goes here</p>
                                                                                        </div></a></div>
                                                                            </div>
                                                                            <div class="col-sm-3 col-lg-3 col-md-3">
                                                                                <div class="ih-item circle effect3 top_to_bottom wow slideInRight" data-wow-delay="1s"><a href="http://gudh.github.io/ihover/dist/index.html#">
                                                                                        <div class="img"><img src="<?php echo HTTP_ROOT ?>images/wedget4.jpg" alt="img"></div>
                                                                                        <div class="info">
                                                                                            <h3>Heading here</h3>
                                                                                            <p>Description goes here</p>
                                                                                        </div></a></div>
                                                                            </div>-->

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="menu-mobile">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="<?php echo HTTP_ROOT; ?>scenes">Scenes</a></li>
                    <li><a href="<?php echo HTTP_ROOT; ?>models">Models</a></li>
                    <li><a href="<?php echo HTTP_ROOT; ?>our-sites">Our Sites</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>