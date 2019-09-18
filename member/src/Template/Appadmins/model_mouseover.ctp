<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/cover5photoorder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<style>
    .control-label2{ width: 100%; text-align: left !important; margin-bottom: 10px !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Basic Model Setting</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">


                    <!--     <div class="box-header">
                          <h3 class="box-title">Basic Scene Setting</h3>
                         </div>-->

                    <div class="box-body">
                        <?= $this->Form->create(null, ['type' => 'file', 'data-toggle' => "validator"]); ?>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="email">Model</label>
                                <?= $this->Form->select('model_id', $options, ['class' => "form-control", 'label' => false, 'onchange' => 'setUrl(this.value)', 'default' => @$id]); ?>                

                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom: 40px;">

                            <div class="form-group" style=" position: relative;">
                                <label for="email">Select Cover Photos For Model</label>
                                <input type="file"  name="cover_photo[]"  id="cover_photo" multiple> 
                                <div>
                                    <small class="text-danger">
                                        Upto 5 Photos are allowed For Cover and Mouse-over <br>Height - 141px & Width - 206px                   
                                    </small>

                                </div>
                                <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#1">Click Here to view Cover & mouse-over Image Listing</a></span>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom: 40px;">
                            <div class="form-group" style=" position: relative;">
                                <label for="inputName" >Miniature Picture </label>
                                <?php if (!empty(@$editData->miniature_pic)) { ?>
                                    <img src="<?php echo HTTP_ROOT . PHOTOS . @$editData->miniature_pic; ?>" alt="" width="100">
                                <? } ?>
                                <input  id="miniature_pic" name="mini_pic" type="file" >
                                <div>  
                                    <small class="text-danger">Height:150px & Width:150px. [Used as Top Banner Model Widget.] </small>
                                </div>
            <!--                   <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#1">Click Here to view Cover & mouse-over Image Listing</a></span>-->
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom: 40px;">
                            <div class="form-group" style=" position: relative;">
                                <label for="inputName" >Profile Picture </label>
                                <?php if (!empty(@$editData->cover_pic)) { ?>
                                    <img src="<?php echo HTTP_ROOT . PHOTOS . @$editData->cover_pic; ?>" alt="" width="100">
                                <? } ?>
                                <input  id="cov_pic" name="cov_pic" type="file" >
                                <div>  
                                    <small class="text-danger">Height - 304px & Width - 206px. [Used as  Model profile picture.] </small>
                                </div>
            <!--                   <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#1">Click Here to view Cover & mouse-over Image Listing</a></span>-->
                            </div>
                        </div>


                        <div class="col-xs-12" style="margin-bottom: 40px;">
                            <div class="form-group" style=" position: relative;">
                                <div class="row" role="form" autocomplete="off">
                                    <div class="entry1 input-group" style="    width: 100%;">
                                        <div class="form-horizontal">


                                            <div class="col-sm-12">
                                                <div class="controls1">
                                                    <div class="row" role="form" autocomplete="off">
                                                        <div class="col-sm-5">
                                                            <div class="">
                                                                <label for="inputName" class="control-label control-label2">Url name </label>
                                                                <input class="form-control" id="urlname" name="urlname[]"  type="text" style="width: 100%;"/>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="">
                                                                <label for="inputName" class="control-label control-label2">Url </label>
                                                                <input class="form-control" id="tkt_price" name="url[]"  type="text" style="width: 90%;"/>
                                                                <div class="help-block with-errors"></div>
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success btn-add" type="button">
                                                                        <span class="glyphicon glyphicon-plus"></span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               


                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        <?= $this->Form->end(); ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    <section class="content" id="1">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cover and Mouse-over photos Listing</h3>
                        <div>
                            <small class="text-danger">Only top 5 photos are selected  as Cover photo.<br>You can arrange this order by dragging <b class="text-success">Green cross</b></small>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="text-align:  center;">Image</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php foreach ($cover_photo as $list): ?>
                                    <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                        <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>
                                        <td style="text-align:  center;"> <img src="<?php echo HTTP_ROOT . PHOTOS . $list->photo_name; ?>" width="80"></td>


                                        <td style="text-align: center; width: 20%">


                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'CoverMainPhotos'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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
    <section class="content"  id="2">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">Url Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>Url name</th>
                                <th>url</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php
                            $i = 1;
                            foreach ($urls_lists as $vals) {
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $vals->urlname; ?></td>
                                    <td><?= $vals->url; ?></td>
                                    <td>                                  
    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $vals->id, 'ModelUrl'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

</div>
<script>
    function setUrl(id) {

        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/model_mouseover/' ?>' + id;
    }
</script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "order": [[0, 'asc']],
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
        });
    });
</script>
<script>
    $(function ()
    {
        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();
            var controlForm = $('.controls1 div:first'),
                    currentEntry = $(this).parents('.entry1:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            controlForm.find('.entry1:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function (e)
        {
            $(this).parents('.entry1:first').remove();
            e.preventDefault();
            return false;
        });
    });</script>
<script>
    $(document).ready(function () {
        $('#release_date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });

    });
</script>