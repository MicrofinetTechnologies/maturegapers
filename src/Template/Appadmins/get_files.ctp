<?php
$currUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?> 
<style>
    .folder-main:hover {
    	opacity: .5;
    }
    .folder-main a:hover,.folder-main a:active,.folder-main a:focus {
    outline: none;
    text-decoration: none;
    color: #b62329 !important;
}
</style>
<script>
<?php if(!empty($_GET['s']) ){ ?>
    $(document).ready(function(){
        $('#sort_by').val('<?=$_GET['s'];?>');
    });
    
<?php } ?>
//update URL in js
    function updateQueryStringParameter(uri, key, value) {
        var URL;
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            URL = uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            URL = uri + separator + key + "=" + value;
        }
        //window.history.pushState(null, document.title, URL);
        window.location.href=URL;
    }

</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            echo "Generate Ftp Videos";
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
                    <div class="row">
            <div class='col-xs-12' style="margin-top:5px;">
                <div class='col-sm-offset-8 col-xs-1'>
                    <p style="font-size:16px;font-weight:600;margin: 0 !important;padding-top: 5px;">Sort by :</p>
                </div>
                    
                <div class='col-xs-3'>
                    <div class="form-group">
                        <select class="form-control" id="sort_by" onchange="updateQueryStringParameter('<?=$currUrl;?>','s',this.value)">
                            <option selected disabled value=''>Select sort by</option>
                            <option value='id-ASC'>Id  - ASC</option>
                            <option value='id-DESC'>Id  - DESC</option>
                            <option value='scene_name-ASC'>Scene name - ASC</option>
                            <option value='scene_name-DESC'>Scene name - DESC</option>
                            
                            
                            
                            <!--<option value='releasedate-ASC'>Release date - ASC</option>-->
                            <!--<option value='releasedate-DESC'>Release date - DESC</option>-->
                            
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
                    <?php
                    $file2=[];
                    foreach ($files1 as $val) {
                        if ($val != '.' && $val != '..') {
                            $temp =explode('-',$val);
                            $file2[end($temp)]= $val;
                        }
                    }
                    if(!empty($_GET['s']) && $_GET['s'] == 'id-ASC'){
                        ksort($file2);
                    }
                    if(!empty($_GET['s']) && $_GET['s'] == 'id-DESC'){
                        krsort($file2);
                    }
                    if(!empty($_GET['s']) && $_GET['s'] == 'scene_name-ASC'){
                        asort($file2);
                    }
                    if(!empty($_GET['s']) && $_GET['s'] == 'scene_name-DESC'){
                        arsort($file2);
                    }
                    //pj($file2);
                    echo "<hr style='margin:0;border: 0;border-bottom: 1px solid #ccbfbf;'>";
                    foreach ($file2 as $val) {
                        if ($val != '.' && $val != '..') {
                            ?>
                            <div class="folder-main" style="padding: 5px 0px 5px 15px;border-bottom: 1px solid #ccbfbf;">
                                <a href="<?= HTTP_ROOT; ?>appadmins/updatefolder/<?= $val; ?>" ><i class="fa fa-folder"></i> &nbsp; &nbsp;<?= $val; ?></a>
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