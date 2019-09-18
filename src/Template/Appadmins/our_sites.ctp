<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/scenesgallOrder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<style>
    .form-control {
        width: 98% !important;
    }
    .box.box-primary div {
        font-size: 16px;
        margin: 5px 2px;
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Our sites  </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/addSitesPhoto"><i class="fa fa-list"></i> Add sites photo</a></li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create('', array('data-toggle' => "validator", 'type' => 'file')); ?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Descriptions <span style="color: red;">*</span> </label>
                                <?= $this->Form->input('id', ['type' => 'hidden', 'value' => @$editData->id]); ?>

                                <textarea name="descriptions" class="form-control" kl_virtual_keyboard_secure_input="on" id="descriptions" rows="5"><?= @$editData->descriptions; ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputName">Site Logo <span style="color: red;">*</span></label><br>
                                <small class="text-warning">"Logo width should be used 161px × 81px"</small>
                                <?php echo $this->Form->input('image', array('type' => 'file','label'=>false)); ?> 
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                        <?php if (@$id) { ?>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputName"><img width="100" src="<?php echo HTTP_ROOT . OURSITES . $editData->logo ?>"/></label>

                                </div>
                            </div>
                        <?php } ?>




                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputName">Cover  Photo <span style="color: red;">*</span></label><br>
                                <small class="text-warning">"Cover photo  upload 5 maximums"</small><br>
                                <small class="text-warning">"Cover photo Height: 844px  & Width: 1277px  "</small>
                                <?php echo $this->Form->input('c_image.', array('type' => 'file', 'multiple' => 'multiple', 'onchange' => "if(parseInt($(this).get(0).files.length)>$photocount) alert('You can only upload a maximum of $photocount files')")); ?> 
                                <div class="help-block with-errors"></div>


                            </div>
                        </div>
                        <?php if (@$id) { ?>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php foreach ($editData['our_sites_photos'] as $listpp) { ?>
                                        <label style="text-align: center; margin-right: 10px;" for="exampleInputName">

                                            <img style=" display: block; margin-bottom: 10px;" width="100" src="<?php echo HTTP_ROOT . OURSITES . $listpp->file_name ?>"/>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'deleteOurSitesPhotos', $listpp->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>

                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-sm-8">   
                            <div class="form-group">
                                <label for="inputName">  Video quality</label><br>

                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Full HD" name="video_quality[]" <?php
                                    if (in_array('Full HD', explode(",", @$editData->video_quality))) {
                                        echo "checked";
                                    }
                                    ?>>1080p(HD)
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="4K" name="video_quality[]" <?php
                                    if (in_array('4K', explode(",", @$editData->video_quality))) {
                                        echo "checked";
                                    }
                                    ?>>2160p(4K)
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Bonus" name="video_quality[]" <?php
                                    if (in_array('Bonus', explode(",", @$editData->video_quality))) {
                                        echo "checked";
                                    }
                                    ?>>Bonus
                                </label>

                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputName">Url <span style="color: red;">*</span></label>

                                <input type="text" name="link" placeholder="Enter url" class="form-control" kl_virtual_keyboard_secure_input="on" required="required" data-error="Enter Phone no" id="link" value="<?= @$editData->link; ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-8" style="margin-top: 10px;">
                            <?php
                            if (@$id) {
                                echo $this->Form->button('Update', ['class' => 'btn btn-primary']);
                            } else {
                                echo $this->Form->button('Save', ['class' => 'btn btn-primary']);
                            }
                            ?>
                        </div>
                        <br> 
                    </div>


                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>




    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sites Listing</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr> 
                                    <th>Order Position</th>
                                    <th>Site Descriptions</th>
                                    <th>Logo</th>
                                    <th>Cover and mouse over photo</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php
                                foreach ($datas as $list):
                                    //pj(); 
                                    ?>
                                    <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">

                                        <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"></span>
                                        </td>
                                        <td><?= $this->Custom->shortLength($list->descriptions, 70); ?></td>
                                        <td><img width="100" src="<?php echo HTTP_ROOT . OURSITES . $list->logo ?>"/></td>
                                        <td>
                                            <?php foreach ($list['our_sites_photos'] as $listp) { ?>
                                                <img width="40" src="<?php echo HTTP_ROOT . OURSITES . $listp->file_name ?>"/>
                                            <?php } ?>

                                        </td>

                                        <td>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'our_sites', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php if ($list->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/OurSites'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/OurSites'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'OurSites'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<style>
    .datepicker {    
        z-index: 11111;}
</style>
<script>
    $(document).ready(function () {
        $('#mod_id').val($("#scenes_id option:selected").val());
        $('#release_date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });

    });
</script>
<script>
    function setUrl(id) {

        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/scenesphoto_gallery/' ?>' + id;
    }
</script>
<script>
    function creategal() {
        var scenes_id = $('#mod_id').val();
        var name = $('#galleryname').val();
        var release_date = $('#release_date').val();

        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "appadmins/createscenesGallary",
            dataType: 'json',
            data: {scenes_id: scenes_id, name: name, release_date: release_date},
            success: function (res) {
                alert(res.msg);
                if (res.status == "success") {
                    location.reload(true);
                }
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "order": [[0, 'asc']],
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
        });
    });
</script>