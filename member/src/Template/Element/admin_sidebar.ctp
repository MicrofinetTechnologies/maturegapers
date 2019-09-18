<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<style>
    .main-sidebar{
        background-color: #222d32!important;
    }
</style>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'index') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/index" >
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createAdmin' || $paramAction == 'viewAdmin')) { ?> active <?php } ?>">
                <a href="javascript:;"><i class="fa  fa-user"></i></i> <span>Manage Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_admin"><i class="fa  fa-user"></i> Create  Users</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_admin"><i class="fa  fa-eye"></i> View  Users</a></li>
                </ul>
            </li>

            <!-- for banner------>
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'viewBanner' || $paramAction=='settingBanner'|| $paramAction=='adBanner')) { ?> active <?php } ?>">
                <a href=""><i class="fa  fa-photo"></i> <span>Slider Settings</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'settingBanner') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/setting_banner"><i class="fa  fa-cog"></i> Banner Setting</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_banner"><i class="fa  fa-eye"></i> View/Slider Banner</a></li>
                    
                </ul>
                
            </li>
            
             <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'leftBanner' || $paramAction=='middleBanner')) { ?> active <?php } ?>">
                <a href=""><i class="fa  fa-photo"></i> <span>Commercial  Banner</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'leftBanner') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/left_banner"><i class="fa  fa-cog"></i> Left ad banner</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'middleBanner') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/middle_banner"><i class="fa  fa-eye"></i> Middle ad banner</a></li>
                    
                </ul>
                
            </li>
            <!--<li class="treeview <?php if ($paramController == 'Appadmins' && ( $paramAction=='adBanner')) { ?> active <?php } ?>">-->
            <!--    <a href='<?= h(HTTP_ROOT) ?>appadmins/ad_banner'><i class="fa  fa-photo"></i> <span>Commercial Slider</span><!--<i class="fa fa-angle-left pull-right"></i> </a>
                
                
            </li>-->
            
<!--            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createMembership')) { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT.'appadmins/create_membership'?>"><i class="fa  fa-medium"></i> <span>Create Membership</span> </a>
               
            </li>-->
            
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createModel' || $paramAction == 'createPhoto' || $paramAction == 'createVideo' || $paramAction == 'modelBanner' || $paramAction == 'modelUrl' || $paramAction == 'modelSetting' || $paramAction =='managemodelPhotos' || $paramAction == 'modelMouseover' )) { ?> active <?php } ?>">
                <a href="#" onClick="location.href='<?= HTTP_ROOT ?>appadmins/model_setting'"><i class="fa  fa-user"></i> <span>Models</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createModel') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_model"><i class="fa  fa-female"></i> Create Models</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelMouseover') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_mouseover"><i class="fa  fa-female"></i> Model Basic Setting</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelSetting') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_setting"><i class="fa  fa-female"></i> Models List</a></li>
                    
<!--                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createVideo') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_video"><i class="fa  fa-female"></i> Model Video</a></li>-->
                    
                    <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'createPhoto' || $paramAction =='managemodelPhotos')) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_photo"><i class="fa  fa-female"></i> Photo Gallery</a></li>
                    
                    <!--<li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelUrl') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_url"><i class="fa  fa-female"></i> Model URL</a></li>-->
                    
<!--                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelBanner') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_banner"><i class="fa  fa-female"></i> Model Banner</a></li>-->
                    
                    
                    
                </ul>
            </li>

            <!--scene manage---------->
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'scenes' || $paramAction == 'scenesList' || $paramAction == 'scenesphotoGallery' || $paramAction == 'managemscenesPhotos' || $paramAction == 'managemscenesPhotos' || $paramAction == 'scenetrailerVideo' || $paramAction == 'scenemainVideo' || $paramAction == 'scenebonusVideo' || $paramAction == 'basicSceneSetting')) { ?> active <?php } ?>">
                <a href="#"><i class="fa fa-object-group"></i> <span>Scenes</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'scenes') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenes"><i class="fa  fa-bullseye"></i> Create Scenes</a></li>
                    
                     <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'basicSceneSetting') ) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/basic_scene_setting"><i class="fa  fa-bullseye"></i> Basic Scene Setting </a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'scenesList') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenes_list"><i class="fa  fa-bullseye"></i> Scenes List</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'scenesphotoGallery' || $paramAction == 'managemscenesPhotos') ) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenesphoto_gallery"><i class="fa  fa-bullseye"></i> Photo Gallery</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'scenetrailerVideo') ) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenetrailer_video"><i class="fa  fa-bullseye"></i> Video -Trailer</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'scenemainVideo') ) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenemain_video"><i class="fa  fa-bullseye"></i> Video -Main</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && ($paramAction == 'scenebonusVideo') ) { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/scenebonus_video"><i class="fa  fa-bullseye"></i> Video -Bonus</a></li>
                    
                    
                </ul>
            </li>
            
            <!---widgets---->
            <li class="treeview <?php if ($paramController == 'Appadmins' && ( $paramAction=='modelFooterWidgets' || $paramAction=='paymentWidgets')) { ?> active <?php } ?>">
                <a href='#'><i class="fa fa-align-center"></i> <span>Widgets</span><i class="fa fa-angle-left pull-right"></i></a>
                
                <ul class="treeview-menu">
                   
<!--                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelFooterWidgets') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_footer_widgets"><i class="fa  fa-bitbucket"></i> Model Footer Widgets</a></li>-->
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'paymentWidgets') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/payment_widgets"><i class="fa  fa-bitbucket"></i> Payment Widgets</a></li>
                </ul>
            </li>


            <!--/* Home page cms */-->

            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'cmsPage' || $paramAction == 'editpages')) { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/cms_page" ><i class="fa  fa-file-text"></i> <span>Footer pages</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'metaTitle') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/meta_title" ><i class="fa fa-tags"></i> <span>SEO setup</span></a>
            </li>

<!--            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'paymentGateways') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/payment_gateways" ><i class="fa fa-cc-jcb"></i> <span>Epeach Payment Gateways</span></a>
            </li>-->
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'ourSites' || $paramAction == 'addSitesPhoto')) { ?> active <?php } ?>">
                <a href="<?= h(HTTP_ROOT) ?>appadmins/our_sites" ><i class="fa fa-fw fa-television"></i> <span> Our sites</span></a>
                
            </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'waterMarkSetting'||$paramAction == 'profile' || $paramAction == 'generalSetting' || $paramAction == 'viewAdmin' || $paramAction == 'footerCms' || $paramAction == 'socialMedia' || $paramAction == 'websiteIcon' ||  $paramAction == 'homeCms' || $paramAction == 'modelHairColor' || $paramAction == 'modelEyeColor')) { ?> active <?php } ?>">
                <a href="javascript:void(0)" ><i class="fa fa-wrench"></i> <span> Site Setting</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'generalSetting') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/generalSetting"><i class="fa fa-gear"></i>General Setting</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>"><a href="<?php echo HTTP_ROOT ?>appadmins/profile" ><i class="fa fa-wrench"></i> <span>Profile Setting</span></a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'themeSetting') { ?> active <?php } ?>"> <a href="<?php echo HTTP_ROOT ?>appadmins/themeSetting"><i class="fa fa-gears"></i>Theme setting</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'footerCms') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/footer_cms"><i class="fa fa-hand-o-down"></i>Footer CMS</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'homeCms') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/home_cms"><i class="fa fa-hand-o-up"></i>Home CMS</a></li>
                    
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'socialMedia') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/social_media"><i class="fa fa-link"></i>Social media</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'websiteIcon') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/websiteIcon"><i class="fa fa-link"></i>Website Icon</a></li>
                 <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'waterMarkSetting') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/water_mark_setting"><i class="fa fa-link"></i>Water mark setting</a></li>
                 
                 <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelHairColor') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_hair_color"><i class="fa fa-link"></i>Model hair color</a></li>
                 
                 <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'modelEyeColor') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/model_eye_color"><i class="fa fa-link"></i>Model eye color</a></li>
                </ul>
            </li>
            

            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>users/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>

        </ul>
    </section>
</aside>