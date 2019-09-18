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
                <a href="javascript:;"><i class="fa  fa-user"></i></i> <span>Manage Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/create_admin"><i class="fa  fa-user"></i> Create  Admin</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_admin"><i class="fa  fa-eye"></i> View  Admin</a></li>
                </ul>
            </li>

            <!-- for banner------>
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'viewBanner' || $paramAction=='settingBanner')) { ?> active <?php } ?>">
                <a href=""><i class="fa  fa-photo"></i> <span>Manage Banner</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'createAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/setting_banner"><i class="fa  fa-cog"></i> Banner Setting</a></li>
                    <li class="<?php if ($paramController == 'Appadmins' && $paramAction == 'viewAdmin') { ?> active <?php } ?>"><a href="<?= h(HTTP_ROOT) ?>appadmins/view_banner"><i class="fa  fa-eye"></i> View/Manage Banner</a></li>
                </ul>
                
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'createMembership')) { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT.'appadmins/create_membership'?>"><i class="fa  fa-medium"></i> <span>Create Membership</span> </a>
               
            </li>

            <!--scene manage---------->
            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'scenes')) { ?> active <?php } ?>">
                <a href="<?= (HTTP_ROOT) ?>appadmins/scenes"><i class="fa  fa-users"></i> <span>Create Scene</span></a>
                
            </li>


            <!--/* Home page cms */-->

            <li class="treeview <?php if ($paramController == 'Appadmins' && ($paramAction == 'cmsPage' || $paramAction == 'editpages')) { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/cms_page" ><i class="fa  fa-file-text"></i> <span>CMS pages</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'metaTitle') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/meta_title" ><i class="fa fa-tags"></i> <span>SEO setup</span></a>
            </li>

            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'paymentGateways') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/payment_gateways" ><i class="fa fa-cc-jcb"></i> <span>Epeach Payment Gateways</span></a>
            </li>
            <li class="treeview <?php if ($paramController == 'Appadmins' && $paramAction == 'profile') { ?> active <?php } ?>">
                <a href="<?php echo HTTP_ROOT ?>appadmins/profile" ><i class="fa fa-wrench"></i> <span>Setting</span></a>
            </li>
            <li>
                <a href="javascript:void(0)" data-toggle="control-sidebar"><i class="fa fa-gears"></i>Theme setting</a>
            </li>

            <li><a style="color: red;" href="<?= h(HTTP_ROOT) ?>users/logout"><i class="fa fa-key"></i> <span>Logout</span></a></li>

        </ul>
    </section>
</aside>