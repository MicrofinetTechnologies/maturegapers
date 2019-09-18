<div class="content-wrapper">

    <section class="content-header">
        <h1>Delete Source File  </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <?php
                        $ij = 1;
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Scene Name</th>
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                foreach ($allVideo as $val) {
                                    if (file_exists("/home/maturegapers/public_html/webroot/files/videos/" . $val->scene_id . '/' . $val->video_file)) {
                                        ?>
                                        <tr>
                                            <td><?= $ij++; ?></td>
                                            <td><?= $val->sv->scene_name; ?></td>
                                            <td><?= $val->video_name; ?><br><small style="color:orange;"><?= $val->video_file; ?></small></td>
                                            <td><?= $val->is_tailer; ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?=HTTP_ROOT;?>appadmins/delete_source_file/<?=$val->id;?>" class="btn btn-danger" onclick='if (confirm("Are you sure you want to delete Source File ?")) { return true; } return false;'>Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        //echo $val->scene_id . " " . $val->is_tailer . " - "  . " - " . $val->video_file . "<br>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "asc" ]]
    } );
} );
</script>