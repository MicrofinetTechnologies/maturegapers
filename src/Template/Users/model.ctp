<?= $this->element('frontend/header'); ?>
<?= $this->element('frontend/banner'); ?>
<?= $this->element('frontend/banner_bottom'); ?>
<link rel="stylesheet" href="<?= $this->Url->css('model-Carousel.min.css'); ?>">
<?php
//pj($this->User->topscenesHelper());
$first_scenes = $this->User->topscenesHelper();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<script>
    function updateQueryStringParameter(uri, key, value) {
        var URL;
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            URL = uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            URL = uri + separator + key + "=" + value;
        }
        window.location.href = URL;
    }
</script>
<?php if (!empty($_GET['q'])) { ?>
    <script>
        $(document).ready(function () {
            var scrollPos = $("#main-divvv").offset().top;
            $(window).scrollTop(scrollPos);
        });
    </script>
<?php } ?>
<style>
    .rrbt .btn{
        padding: 4px 10px;
        margin-bottom: 7px;
        margin-top: 7px;
    }
    .rrbt .btn:hover {
        color: #333;
        text-decoration: none;
        border: 1px solid transparent;
        background: #fff;
    }
    .pagination li a {
        color: #2c2929c2 !important;
    }
</style>
<div class="contain-section">
    <div class="container">

        <div class="contain-in">
            <div class="model-box" id="main-divvv">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h2>Model Index</h2>
                    </div>
                </div>
                <div class="row pagination" >
                    <div class="rrbt col-sm-12 col-lg-12 col-md-12">
                        <button class="btn <?= ($_GET['q']) == 'All' ? ' btn-primary' : ''; ?>" onclick="updateQueryStringParameter('<?= $currUrl; ?>', 'q', 'All')">All</button>
                        <?php foreach (range('A', 'Z') as $column) { ?>
                            <button onclick="updateQueryStringParameter('<?= $currUrl; ?>', 'q', '<?= $column; ?>')" class="btn <?= ($_GET['q']) == $column ? ' btn-primary' : ''; ?>"><?= $column; ?></button>
                        <?php } ?>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="mdel-boxed">
                            <ul>
                                <?php
                                if ($cnt_md > 0) {
                                    foreach ($modelDetails as $val) {
                                        ?>
                                        <li>
                                            <div class="img-slide">
                                                <a href="<?php echo HTTP_ROOT . 'model-single?name=' . $val->model_name . '-' . $val->id ?>"><div class="item2">
                                                        <?php
                                                        $gall_photo = $this->User->modelcover5($val->id);
                                                        $first = "";
                                                        $ewww = 0;
                                                        foreach ($gall_photo as $photos) {
                                                            $ewww++;
                                                            if ($ewww == 1) {
                                                                $first = HTTP_ROOT . PHOTOS . $photos->photo_name;
                                                            }
                                                            ?>	
                                                            <img src="<?= HTTP_ROOT . PHOTOS . $photos->photo_name; ?>" alt="">
                                                        <?php } ?>
                                                    </div></a>
                                                <a class="img-a" href="<?php echo HTTP_ROOT . 'model-single?name=' . $val->model_name . '-' . $val->id ?>"> 
                                                    <img src="<?php echo $first; ?>" alt="">
                                                </a>
                                            </div>

                                            <h4><a href="<?php echo HTTP_ROOT . 'model-single?name=' . $val->model_name . '-' . $val->id ?>"><?= $val->model_name; ?></a></h4>
        <!--        					<h6>Rating: <strong>8.22</strong><div class="like-counter"><span><i class="far fa-thumbs-up"></i> 12</span><span><i class="far fa-thumbs-down"></i> 30</span></div></h6>-->
                                        </li>
                                        <?php
                                    }
                                } else {
                                    echo "<li style='font-size: 22px;'>No model available.</li>";
                                }
                                ?>
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
                    <h3>Want to see more?</h3>
                    <a href="<?php echo HTTP_ROOT . 'joinus'; ?>">Instant Access</a>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->cell('Action::left_advertise'); ?>
</div>

<?= $this->element('frontend/footer'); ?>
<script  src="<?= $this->Url->script('one_slider.js'); ?>"></script>
<script src="<?= $this->Url->script('model-Carousel.min.js'); ?>"></script>
<script>

                                $(document).ready(function () {
                                    $(".item2").brazzersCarousel();
                                });

</script>