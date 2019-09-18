<?php
@$param2 = $this->request->params['pass'][1];

$requiredsec = "required";
if (!empty($id)) {
    $requiredsec = "";
    ?>
    <script>
        $(document).ready(function () {
            $('#manage_banner').slideToggle(1000);
        });

    </script>
<?php } ?>
<style>
    .box.box-primary div {
        margin: 0px 0px !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Left ad banner listing</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  style="color: red;font-size: 15px;" onclick="$('#manage_banner').slideToggle(1000)" class="active" href="javascript:void(0);"> <i class="fa fa-book"></i><?php echo "Create new  banner"; ?></a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div id="error_msg_date" class="help-block with-errors"></div>
                    <div id="manage_banner" class="box box-default"  style="<?php echo ($param2) ? 'border-top: none; display: block;' : 'border-top: none; display: none;'; ?>">
                        <div class="box-header with-border1">
                            <h3 class="box-title">
                                <?php
                                echo " Add left ad banner";
                                ?>
                            </h3>
                            <div class="box-tools pull-right">
                                <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-primary">
                                        <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform', 'type' => 'file')); ?>
                                        <div class="box-body">
                                            <p style="color: red;">All (*) fields are mandatory</p>
                                            <div class="col-md-12">
                                                <div class="col-md-6">  
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Banner<span style="color: red;">*</span></label>
                                                        <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", $requiredsec]); ?>
                                                        <?php  if (!empty($editData->image)) { ?>
                                                            <img width="80" src="<?php echo HTTP_ROOT . AD_BANNERS . $editData->image ?>">
                                                        <?php } ?>
                                                            <div class="help-block with-errors"></div><br><br>
                                                        <small class="text-warning"> Image should be width 245px and height should be 398px</small>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">URL <span style="color:#FF0000">*</span></label><br>
                                                        <input class= "form-control" type="text" <?=$requiredsec;?> name="c_url" value="<?=@$editData->c_url;?>">
                                                        <small class="text-warning">Use full Url like : http://www.google.com</small><br>
                                                        <div class="help-block with-errors"></div><br>

                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <?php
                                                    if (!empty($id)) {
                                                        echo $this->Form->button('Update', ['class' => 'btn btn-success', 'id' => 'add']);
                                                    } else {
                                                        echo $this->Form->button('Save', ['class' => 'btn btn-success', 'id' => 'add']);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?= $this->Form->end() ?>
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->

                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Banner Listing</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>


                                    <th>Banner</th>
                                    <th>Url</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php foreach ($datas as $list): ?>
                                    <tr>

                                        <td style="text-align:  left;"><img width="80" src="<?php echo HTTP_ROOT . AD_BANNERS . $list->image ?>"></td>
                                        <td><?=$list->c_url;?></td>
                                        <td style="text-align: center; width: 20%">

                                            <a href="<?php echo HTTP_ROOT . 'appadmins/left_banner/' . $list->id; ?>" data-placement="top" data-hint ="Edit" class = "btn btn-warning hint--top  hint" style ='padding: 0 7px!important;'> <i class="fa fa-edit"></i> </a>

                                            <?php if ($list->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/CommericalBanners'; ?>" data-placement = "top" data-hint = "Active" class = "btn btn-success hint--top  hint"style = 'padding: 0 7px!important;'> <i class="fa fa-check"></i></a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/CommericalBanners'; ?>" data-placement = "top" data-hint = "Inactive" class = "btn btn-danger hint--top  hint" style = 'padding: 0 7px!important;'> <i class="fa fa-times"></i></a>
                                            <?php } ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'CommericalBanners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(document).ready(function () {
        var Url = window.location.href;
        var splitUrl = Url.split('/')[6];
        validateImo(splitUrl);
        return false;
    });
    function validateImo(splitUrl) {
        $('#bannerform').validator().on('submit', function () {
            if (splitUrl) {
                $(':button[type="submit"]').prop('disabled', false);
            } else {
                $(':button[type="submit"]').prop('disabled', true);

            }
        })
    }

</script>


<!--                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label">Chose Model <span style="color:#FF0000">*</span></label>
                                                        <select name='model_id' class= "form-control" label= "false">
                                                            <?php /*
                                                            foreach ($options as $key => $value) {
                                                                ?>
                                                                <option value="<?= $key; ?>" <?= ($key == @$editData->model_id) ? "selected='selecte'" : ""; ?>><?= $value; ?></option>
                                                                <?php
                                                            }
                                                             */
                                                            ?>
                                                        </select>
                                                        <div class="help-block with-errors"></div>

                                                    </div>
                                                </div>-->