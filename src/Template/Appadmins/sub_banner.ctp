<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/subbannerOrder", order, function (theResponse) {
                });
            }
        });
    });
</script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            //
            echo "Create model banner";
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= HTTP_ROOT; ?>appadmins/view_banner"> <i class="fa fa-list"></i>Banner List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

<?= $this->Form->create(null, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName">Title <span style="color: red;">*</span></label>
<?= $this->Form->input('title', ['placeholder' => "Enter banner title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editsubBanner->title, 'data-error' => 'Enter title']); ?>
                                <?= $this->Form->input('banner_id', ['type' => "hidden", 'label' => false, 'value' => @$banner_id]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$sub_banner_id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="exampleInputEmail">Description <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
<?= $this->Form->input('description', ['placeholder' => "Enter banner description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editsubBanner->description, 'required' => "required", 'data-error' => 'Enter description']); ?>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="form-group">

                                <label for="exampleInputEmail">Upload Model Banner Image <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
<?= $this->Form->input('image', ['type' => "file", 'label' => false]); ?>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">

<?php
if (isset($sub_banner_id)) {
    echo $this->Form->button('Update Banner', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
} else {
    echo $this->Form->button('Create Banner', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
}
?>
                    </div>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <h3> Sliding Banner Listing </h3><small style="color:green;">Only 4 model profile allowed</small>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
<?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                        <a href="<?php echo HTTP_ROOT; ?>appadmins/index">  <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
<?php

foreach ($detailsBanner as $banlist):
    
    ?>
                                    <tr  id="arrayorder_<?php echo $banlist->id; ?>" class="message_box ui-sortable-handle">
                                        <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $banlist->sort_order; ?></span></td>
                                        <td> <?php if (empty($banlist->image)) { ?>
                                                <img src="<?php echo HTTP_ROOT . BANNERS . 'no-image-icon.png'; ?>" width='50'/>
                                            <?php } else { ?>
                                                <img src="<?php echo HTTP_ROOT . BANNERS . $banlist->image; ?>" width='50'/>
                                            <?php } ?>
                                        </td>
                                        <td><?=$banlist->title;?></td>
                                        <td style="text-align: center;">

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'subBanner',$banlist->banner_id, $banlist->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteSubBanner', $banlist->id, 'Banners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete subbanner ?')]); ?>

                                            <?php if ($banlist->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $banlist->id . '/Banners/subBanner'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $banlist->id . '/Banners/subBanner'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>

<script>
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                        } );
                    } );
</script>