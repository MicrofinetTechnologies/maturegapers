<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo "Get Code";
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box-body">
                    <h4>Script Tag</h4>
                    <pre style="font-weight: 600;"><?php echo $scriptTag;?></pre>
                    <h4>Iframe Tag</h4>
                    <pre style="font-weight: 600;"><?php echo $iframe;?></pre>
                   
                </div>
            </div>
        </div>
    </section>
</div>