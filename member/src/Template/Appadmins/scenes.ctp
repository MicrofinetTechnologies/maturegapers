<!--<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list").sortable({class: 'move', update: function () {
                var order = $('#list').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/scenseOrder", order, function (theResponse) {
                });
            }
        });
    });
</script>-->
<div class="content-wrapper">
    <section class="content-header">
        <h1> Create Scenes </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/scenes_list"><i class="fa fa-list"></i> Scenes List</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li id="li_scienc" class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/scenes/' ?>">Create Scene </a></li>
<!--                        <li id='li_general'><a href="<?php echo HTTP_ROOT . 'appadmins/create_model/'.$id ?>">Create Model </a></li>
                        <li id='li_schedule'><a href="#schedule" data-toggle="tab" aria-expanded="false">Model Video </a></li>
                        <li id='li_photo'  ><a href="#photo" data-toggle="tab" aria-expanded="true">Model photo</a></li>-->

                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="box box-primary">

                            <?= $this->Form->create(null, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                            <div class="box-body">
                                <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

                                <div class="col-md-9" style="margin-top: 27px;">
                                    <div class="form-group">
                                        <label for="exampleInputName">Scene Name <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('id', ['type'=>'hidden','value'=>@$editData->id, 'required' => "required"]); ?>
                                        <?= $this->Form->input('scene_name', ['placeholder' => "Enter scene name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value'=>@$editData->scene_name, 'required' => "required", 'data-error' => 'Enter Name']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

<!--                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Set Scene Timing <span style="color: red;">*</span></label>
                                        <select id="time_show" class = "form-control" name="time_show"> 
                                            <option <?php if(@$editData->time_show=='Mid night(12 AM - 4 AM)') {?> selected="selected"  <?php } ?> value="Mid night(12 AM - 4 AM)">Mid night(12 AM - 4 AM)</option>
                                            <option <?php if(@$editData->time_show=='Morning(4 AM - 9 AM)') {?> selected="selected"  <?php } ?> value="Morning(4 AM - 9 AM)">Morning(4 AM - 9 AM)</option>
                                            <option <?php if(@$editData->time_show=='9 AM - 1 PM') {?> selected="selected"  <?php } ?> value="9 AM - 1 PM">9 AM - 1 PM</option>
                                            <option <?php if(@$editData->time_show=='1 PM - 6 PM') {?> selected="selected"  <?php } ?> value="1 PM - 6 PM">1 PM - 6 PM</option>
                                            <option <?php if(@$editData->time_show=='6 PM - 12 AM') {?> selected="selected"  <?php } ?> value="6 PM - 12 AM">6 PM - 12 AM</option>
                                        </select>

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>-->
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Set Model 1<span style="color: red;">*</span></label>
                                        <select id="model1" class = "form-control" name="model1" > 
                                            
                                            <option  value="" disabled="disabled" selected="selected">----Choose a model----</option>
                                            <?php if(isset($id)){ ?>
                                            <option  value="0">None</option>
                                            <?php } ?>
                                            <?php foreach($modelListings as $modeldata){ ?>
                                            <option  value="<?=$modeldata->id;?>" <?php if(isset($editData->model1) && $modeldata->id==$editData->model1){echo"selected";}  ?>><?=$modeldata->model_name;?></option>
                                            <?php } ?>
                                        </select>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Set Model 2</label>
                                        <select id="model2" class = "form-control" name="model2" > 
                                            <option  value="" disabled="disabled" selected="selected">----Choose a model----</option>
                                            <?php if(isset($id)){ ?>
                                            <option  value="0">None</option>
                                            <?php } ?>
                                            <?php foreach($modelListings as $modeldata){ ?>
                                            <option  value="<?=$modeldata->id;?>" <?php if(isset($editData->model2) && $modeldata->id==$editData->model2){echo"selected";}  ?>><?=$modeldata->model_name;?></option>
                                            <?php } ?>
                                        </select>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Set Model 3</label>
                                        <select id="model3" class = "form-control" name="model3"> 
                                            <option  value="" disabled="disabled" selected="selected">----Choose a model----</option>
                                            <?php if(isset($id)){ ?>
                                            <option  value="0">None</option>
                                            <?php } ?>
                                            <?php foreach($modelListings as $modeldata){ ?>
                                            <option  value="<?=$modeldata->id;?>" <?php if(isset($editData->model1) && $modeldata->id==$editData->model3){echo"selected";}  ?>><?=$modeldata->model_name;?></option>
                                            <?php } ?>
                                        </select>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                
                                <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="inputName">Release Date <span style="color:#FF0000">*</span></label>
                                    
                                        <input class="form-control release_date"  required="required" data-error = 'Enter scene video release date' id="release_date" name="releasedate" type="text"  autocomplete="off" value="<?=date('Y/m/d',strtotime(@$editData->releasedate));?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Description<span style="color: red;">*</span></label>
                                        <textarea name="description"  class = "form-control" required="required" data-error="You need to describe this scene."><?=@$editData->description;?></textarea>

                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">SEO Setting</label>
                                        <input type="text" name="seo_keyword"  class = "form-control" value="<?=@$editData->seo_keyword;?>" >

                                        <div class="help-block with-errors"></div>

                                    </div>
                                     <div class="row"><div class="col-sm-12"> <div class="text-danger"><small>
    "The latest photos of # on %" - the system will know, that # = model name, and % = website URL
                                        </small></div></div></div>
                                </div>



                            </div>
                            <div class="box-footer">

                                <?php
                                if($id){
                                     echo $this->Form->button('Update Scene', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                }else {
                                echo $this->Form->button('Add Scene', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                }
                                ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>

                    </div>
                </div>



            </div>

        </div>
      
    </section>

</div>

<!--<script>
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                        } );
                    } );
</script>-->


<!--
onchange="getmodeldata()"
<script>
                                    function getmodeldata(){
                                        var model_id = $("#model_show option:selected").val();
                                        var scenes_id = $("input[type='hidden'][name='id']").val();
                                        console.log(scenes_id);
                                        if(scenes_id == null || scenes_id == '' || scenes_id=="undefined"){
                                            scenes_id=0;
                                        }
                                        jQuery.ajax({
                                            type: "POST",
                                            url: " <?= HTTP_ROOT; ?>"+'appadmins/modelalldata',
                                            dataType: 'html',
                                            data: {model_id:model_id,scenes_id:scenes_id},
                                            success: function(res) {
                                            $('#modeldata').html(res);
                                            }
                                        });
                                    }
                                    $(document).ready(function() {
                                        var model_id = $("#model_show option:selected").val();
                                        var scenes_id = $("input[type='hidden'][name='id']").val();
                                        if((model_id == null || model_id == '' || model_id=="undefined") && (scenes_id == null || scenes_id == '' || scenes_id=="undefined")){
                                            
                                        }else{
                                            jQuery.ajax({
                                            type: "POST",
                                            url: " <?= HTTP_ROOT; ?>"+'appadmins/modelalldata',
                                            dataType: 'html',
                                            data: {model_id:model_id,scenes_id:scenes_id},
                                            success: function(res) {
                                            $('#modeldata').html(res);
                                            }
                                        });
                                        }
                                    });
                                </script>-->

<!--   <div id="modeldata"></div>-->

<script>
$(document).ready(function() {
    $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
    
});
</script>