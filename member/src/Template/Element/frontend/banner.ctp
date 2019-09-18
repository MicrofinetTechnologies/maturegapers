<div class="banner">
     <ul class="socila-box">
         <?php foreach($media as $med){ ?>
        <li><a href="<?=$med->link;?>"><?=$med->image;?></a></li>
        <?php } ?>
    </ul>
    <img class="doloshub" src="<?php echo HTTP_REMOTE ?>images/dollshub.gif" alt="" onclick="window.open('http://dollshub.com/', '_blank');">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <section class="jk-slider">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">

                            <?php
                            $count = 1;
                            foreach ($banners as $banner) {
                                ?>

                                <div class="item <?php if ($count == 1) { ?>active <?php } ?>">
    <!--                                    <a href="<?php //echo HTTP_ROOT.'users/setBannerCookie/'.$banner->scene_id; ?>"><img src="<?php //echo HTTP_ROOT . BANNERS . $banner->image  ?>" /></a>-->
                                    <a href="#second-vsection1"><img src="<?php echo HTTP_REMOTE . BANNERS . $banner->image ?>" onclick="getsceneid(<?= $banner->scene_id; ?>)"/></a>                                    
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
                                    if ($subbanner->miniature_pic != "" && $subbanner_miniature_pic <= 4) {
                                        // pj($subbanner->image);
                                        ?>
                                        <div class="col-sm-3 col-lg-3 col-md-3">
                                            <div class="ih-item circle effect3 top_to_bottom wow slideInLeft" data-wow-delay="0.3s">
                                                <a href="<?= HTTP_ROOT . 'model-single?name=' . $subbanner->model_name . '-' . $subbanner->id; ?>">
                                                    <div class="img"><img src="<?php echo HTTP_REMOTE . PHOTOS . $subbanner->miniature_pic; ?>" alt="img"></div>
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
                    <li><a href="<?php echo HTTP_ROOT;?>scenes">Scenes</a></li>
                    <li><a href="<?php echo HTTP_ROOT;?>models">Models</a></li>
                    <li><a href="<?php echo HTTP_ROOT;?>our-sites">Our Sites</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>