<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo $filename ." : Available folders";
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <?php
                    
                    foreach ($files1 as $val) {
                        if($val!= '.' && $val != '..'){                           
                    ?>
                    <div class="folder-main" style="padding: 5px 0px 5px 15px;border-bottom: 1px solid #ccbfbf;">
                        <a href="<?=HTTP_ROOT;?>appadmins/updateftpvideo/<?=$filename;?>/<?=$val;?>/" ><i class="fa fa-folder"></i> &nbsp; &nbsp;<?=$val;?></a>
                    </div>
                    
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


</div>