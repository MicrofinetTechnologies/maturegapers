<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/modelBannerOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Model Banner </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
<!--                        <li id="li_scienc"><a href="<?php echo HTTP_ROOT . 'appadmins/scenes/' ?>">Create Scene </a></li>-->
<!--                        <li id='li_general' ><a href="<?php echo HTTP_ROOT . 'appadmins/create_model/' . $model_id ?>">Create Model </a></li>
                        <li id='li_schedule'><a href="<?php echo HTTP_ROOT . 'appadmins/create_video/' .  $model_id ?>" >Model Video </a></li>
                        <li id='li_photo' ><a href="<?php echo HTTP_ROOT . 'appadmins/create_photo/' . $model_id ?>">Model photo</a></li>
                        <li id='li_url' ><a href="<?php echo HTTP_ROOT . 'appadmins/model_url/' . $model_id ?>" >Model URL</a></li>-->
                        
                       <li id='li_banner' class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/model_banner/' . $model_id ?>" >Model Banner</a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="photo"> 
                            <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>

                                <input   required="required" id="scenes_id" name="scene_id" type="hidden" value='<?php echo @$id; ?>'>
                                <input   required="required" id="id" name="id" type="hidden" value='<?php echo @$photo_id; ?>'>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Chose Model <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <?= $this->Form->select('model_id', $options, ['class' => "form-control", 'label' => false, 'onchange' => 'setUrl(this.value)', 'default' => @$model_id]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"> Photo </label>
                                    <div class="col-sm-8">
                                        <input type="file" name='photo_filess' id='photo_filess'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Release Date <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control release_date"  required="required" data-error = 'Enter model photo release date' id="release_date" name="release_date" type="text"  autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">

                                        <span style="padding-top: 3px; display: block; color: red"> "Photo width should be used 700px" </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name='photo_save' value="4" id='photo_save' class="btn btn-danger">Save</button>  

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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">Model Photo Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th></th>
                                <th>Img</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php foreach ($dataListings as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                     <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
                                    <td style="text-align:  left;"><img width="50" src="<?php echo HTTP_ROOT.PHOTOS.'/'.@$model_id.'/thumb_'.$list->files_name;?>" ></td> 
                                    <td style="text-align: center; width: 20%">
                                        
                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/ModelBanners'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/ModelBanners'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'ModelBanners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function setUrl(id) {
       
        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/model_banner/' ?>' + id;
    }
</script>

<script>
$(document).ready(function() {
    $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
    
});
</script>

