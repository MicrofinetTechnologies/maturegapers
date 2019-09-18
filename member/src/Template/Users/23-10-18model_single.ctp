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

    .folder-wrap {
    float: left;
    width:250px;
    height: 180px;
    margin:0 20px;
}

.folder {
    width:250px;
    height: 180px;
    border-radius: 5px;
    text-align: center;
    
}

.back {
    position: absolute;
    background: url(http://fc01.deviantart.net/fs71/i/2010/173/8/b/iOS_fiber_Texture_by_reddevilsX.png) repeat; 
}

.tab {
    width: 80px;
    height:20px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    margin: -10px 0 0 20px;
    background: url(http://fc01.deviantart.net/fs71/i/2010/173/8/b/iOS_fiber_Texture_by_reddevilsX.png) repeat; 
    
}

.paper {
    position: absolute;
    width:230px;
    height:160px;
    margin:15px 0 0 15px;
    background: #fff;
    -webkit-transition: .25s ease-in;
            transition: .25s ease-in;
  
}

.front-gradient {
    width:250px;
    height:200px;
    position: absolute;
    z-index: 1000; /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(74%,rgba(0,0,0,0.4)), color-stop(100%,rgba(0,0,0,0.4))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.4) 74%,rgba(0,0,0,0.4) 100%); /* Chrome10+,Safari5.1+ */ /* Opera 11.10+ */ /* IE10+ */
background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), color-stop(74%, rgba(0,0,0,0.4)), to(rgba(0,0,0,0.4)));
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.4) 74%, rgba(0,0,0,0.4) 100%);
background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.4) 74%,rgba(0,0,0,0.4) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#66000000',GradientType=0 ); /* IE6-9 */

}

.front {
    position: absolute;
    overflow: hidden;
    -webkit-transition: .25s ease-in;
            transition: .25s ease-in;
    height: 170px !important;
    margin: 10px 0 0 6px;
    -webkit-transform: skewX(-4deg);
    -ms-transform: skewY(value);
            transform: skewY(value);
    background: url(http://fc01.deviantart.net/fs71/i/2010/173/8/b/iOS_fiber_Texture_by_reddevilsX.png) center center no-repeat;
    
}

.folder-wrap:hover .front {
    position: absolute;
    z-index: 100;
    height: 160px !important;
    
    margin: 20px 0 0 22px;
    -webkit-transform: skewX(-15deg);
-ms-transform: skewY(value);
        transform: skewY(value);
}

.folder-wrap:hover .paper {
    -webkit-transform: rotate(15deg);
    margin:-20px 0 0 0;
    -webkit-box-shadow: 0 0 50px 0 rgba(0,0,0,.25);
            box-shadow: 0 0 50px 0 rgba(0,0,0,.25);
}


.group:after {
  content: "";
  display: table;
  clear: both;
}
    </style>

<div class="banner">
<img class="doloshub" src="<?=$this->Url->image('dollshub.gif');?>" alt="">
<div class="container">
<div class="row">
<div class="col-sm-12 col-lg-12 col-md-12 join-banner">
<img src="<?=HTTP_ROOT.PHOTOS.$modeldetails->id.'/'.$modelBanner->files_name;?>" alt="">
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
							<img src="<?=HTTP_ROOT.PHOTOS.$modeldetails->id.'/'.$modelphoto->gal_name.'/thumb_'.$modelphoto->files_name;?>" alt="">
						</div>
						<div class="col-sm-9 col-lg-9 col-md-9">
							<ul>	
								<li>Age: <span><?=$modeldetails->age;?></span></li>
								<li>Height:<span><?=$modeldetails->height;?></span></li>
								<li>Hair Color: <span><?=$modeldetails->hair;?></span></li>
								<li>Weight: <span><?=$modeldetails->weight;?></span></li>
								<li>Scence: <span><?=$modelscenescount;?></span></li>
							</ul>
							<div class="abot-single-model">
								<h2>About <?=$modeldetails->model_name;?></h2>
								<p><?=$modeldetails->model_about;?></p>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
            <div class="single-model-sence">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <h2 style="text-align: left;"><?=$modeldetails->model_name;?> Gallery</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <main id="gallery">

                            <?php foreach($modelgallery as $gallery){
                                
                                ?>
                            <a href="<?=HTTP_ROOT.'users/model_gallery/'.$modeldetails->id.'/'.$gallery->name;?>">
                            <div class="folder-wrap group">
                                    <div class="folder back">
                                        <div class="tab">
                                        </div>
                                    </div>
                                    <div class="paper">
                                    </div>
                                    <div class="folder front">
                                        <div class="front-gradient">
                                            <h1><?= $gallery->name; ?></h1>
                                        </div>
                                    </div>      

                                </div>
                            </a>
                                <?php
                            } ?>
                        </main>
                    </div>
                </div>

            </div>
			<div class="single-model-sence">
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12">
<!--					<h2>All scenes with <?=$modeldetails->model_name;?><a href="<?=HTTP_ROOT.'users/model_gallery/'.$modeldetails->id;?>">Model Photo Gallery</a></h2>-->
				</div>
			</div>
			<div class="row">
                            <?php foreach($modelscenes as $scnval){  ?>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="sence-box">
						<div class="single-scence-img">
							<img src="<?=HTTP_ROOT.PHOTOS.'scenes/'.$scnval->id.'/'.$this->User->scenesImageHelper($scnval->id)->gal_name.'/thumb_'.$this->User->scenesImageHelper($scnval->id)->files_name;?>" alt="">
						</div>
							<div class="clearfix"></div>
							<h3><a href="<?=HTTP_ROOT.'users/scenceSingle/'.$scnval->id;?>"><?=$scnval->scene_name;?></a></h3>
							<h5><a href="<?=HTTP_ROOT.'users/model_single/'.$id;?>"><?=$modeldetails->model_name;?></a><div class="video-type"><img src="<?=$this->Url->image('4k-icon.png');?>" alt=""><img src="<?=$this->Url->image('hd-icon.png');?>" alt=""></div></h5>
							<h6>Added: <?=date('dS-M-Y',strtotime($modeldetails->release_date));?><span><img src="<?=$this->Url->image('bonus.png');?>" alt=""></span></h6>
					</div>
				</div>
                            <?php } ?>
			</div>
			<div class="row">
				<div class="col-sm-12 col-lg-12 col-md-12">
					<a class="big-btn-1" href="<?=HTTP_ROOT;?>users/model"><span>Click Here</span> and watch all this scenes <b>right now</b>!</a>
					<a class="view-model" href="<?=HTTP_ROOT;?>users/model">View more models</a>
				</div>
			</div>
			</div>
	</div>
</div>

<?= $this->element('frontend/footer'); ?>
