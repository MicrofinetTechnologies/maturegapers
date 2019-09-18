<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo $filename ."/". $subfolder." : Available Files";
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
                    <div class="folder-main">
                      <i class="fa fa-file-video-o"></i> &nbsp; &nbsp;<?=$val;?>
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