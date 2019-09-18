<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/modelOrder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1> <?php if ($model_id) {
    echo "Edit  <span style='font-size:14px;'>" . $editData->model_name;
    '</span>' ?>  <?php } else { ?> Models <?php } ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/create_model"><i class="fa fa-list"></i> Manage Model</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li id='li_general' class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/create_model/' . $model_id  ?>">Create Model </a></li>

                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">

                        <div class="tab-pane active" id="general">
                            <div id="msg-gen"></div>
                            <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>

                                <input   required="required" id="scenes_id" name="scenes_id" type="hidden" value='<?php echo @$id; ?>'>
                                <input   required="required" id="id" name="id" type="hidden" value='<?php echo @$model_id; ?>'>

<!--                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Please chose scene <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
<?php //$this->Form->select('scenes_id', $scene, ['class' => "form-control", 'label' => false, 'onchange' => 'setUrl(this.value)', 'default' => @$editData->scenes_id]); ?>  
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Model Stage Name <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model name' id="model_name" name="model_name" type="text" value='<?php echo @$editData->model_name; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Model Real Name <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model real name' id="model_real_name" name="model_real_name" type="text" value='<?php echo @$editData->model_real_name; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">About Model <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control"  required="required" data-error = 'Abou model' id="model_about" name="model_about"><?php echo @$editData->model_about; ?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
<!--                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Model URL</label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  data-error = 'Model URL' id="model_real_name" name="model_url[]" type="text" value='<?php echo @$editData->model_url; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    
                                </div>-->
                                
<!--                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Model Age <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model age' id="model_name" name="age" type="text" value='<?php echo @$editData->age; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Date birth <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model date of birth' id="birth_date" name="birth_date" type="text" value='<?php echo @$editData->birth_date; ?>' autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Model dick size <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model dick size' id="dick_size" name="dick_size" type="text" value='<?php echo @$editData->dick_size; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Hair <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        
                                        
                                        <?= $this->Form->select('hair', $haircolor, [ 'required'=>'required', 'data-error' => 'Enter model hair color','class' => "form-control", 'label' => false, 'default' => @$editData->hair,'id'=>'eyes']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Eyes <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        
                                        
                                         <?= $this->Form->select('eyes', $eyecolor, [ 'required'=>'required', 'data-error' => 'Enter model eyes color','class' => "form-control", 'label' => false, 'default' => @$editData->eyes,'id'=>'eyes']); ?>
                                        
                                        
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Height <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model Height' id="height" name="height" type="text" value='<?php echo @$editData->height; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">weight <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model weight' id="weight" name="weight" type="text" value='<?php echo @$editData->weight; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Gender <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
<?= $this->Form->select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], ['required','data-error' => 'Enter model gender','class' => "form-control", 'label' => false, 'default' => @$editData->gender]); ?>  
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tits Size <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control"  required="required" data-error = 'Enter model tits' id="tits" name="tits" type="text" value='<?php echo @$editData->tits; ?>'>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                


<!--                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Cover Picture <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <?php if(!empty(@$editData->cover_pic)){ ?>
                                        <img src="<?php echo HTTP_ROOT.PHOTOS.@$editData->cover_pic; ?>" alt="" width="100">
                                        <? } ?>
                                        <input <?php if(empty(@$editData->cover_pic)){ ?> required <?php } ?>  data-error = 'Upload cover picture is required' id="cover_pic" name="cov_pic" type="file" >
                                        <div class="help-block with-errors"></div>
                                        <small class="text-danger">Height:140px, Width:205px</small>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Release Date <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control release_date"  required="required" data-error = 'Enter model release date' id="release_date" name="release_date" type="text" value='<?php echo @date('Y-m-d',strtotime(empty($editData->release_date)?date('Y-m-d'):$editData->release_date)); ?>' autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
<script>
$(document).ready(function() {
    $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
    $('#birth_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
});
</script>
                    <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">SEO Setting </label>
                                    <div class="col-sm-5">
                                        <input class="form-control release_date"   id="seo_setting" name="seo_keyword" type="text" value='<?php echo @$editData->seo_keyword; ?>' autocomplete="off" placeholder="The latest photos of # on %">
                                        <div class="help-block with-errors"></div>
                                    </div>      
                                    <div class="row"><div class="col-sm-12"> <div class="col-sm-offset-2 col-sm-7 text-danger"><small>
    "The latest photos of # on %" - the system will know, that # = model name, and % = website URL
                                        </small></div></div></div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <?php if (@$model_id) { ?>
                                            <button type="submit" name='gn_save' id='event_save' value="1" class="btn btn-danger">Update</button> 
                                        <?php } else { ?>
                                            <button type="submit" name='gn_save' id='event_save' value="1" class="btn btn-danger">Save</button> 
<?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </section>
<!--    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Model Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Eyes color</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Hair color</th>
                                <th>Dick size</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
<?php foreach ($dataListings as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>
                                    <td style="text-align:  left;"> <?php echo $list->model_name; ?></td>
                                    <td style="text-align:  left;"><?php echo $list->age; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->gender; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->birth_date; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->eye; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->height; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->weight; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->hair; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->dick_size; ?> </td>

                                    <td style="text-align: center; width: 20%">
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-picture-o')), ['action' => 'create_photo', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Picture section", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-youtube-play')), ['action' => 'create_video', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Video section", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_model', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>


                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/Models'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Is allowed : Yes", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/Models'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Is allowed : No", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
    <?php } ?>
                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'Models'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </section>-->
</div>
<script>
    function setUrl(id) {
        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/create_model/' ?>' + id;
    }
</script>
<script>
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                        } );
                    } );
</script>



