
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create Video </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/manage_model"><i class="fa fa-list"></i> Manage Model</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
<!--                        <li id="li_scienc"><a href="<?php echo HTTP_ROOT . 'appadmins/scenes/' ?>">Create Scene </a></li>-->
<!--                        <li id='li_general' ><a href="<?php echo HTTP_ROOT . 'appadmins/create_model/' . $model_id ?>">Create Model </a></li>-->
                        <li id='li_schedule' class="active" ><a href="<?php echo HTTP_ROOT . 'appadmins/create_video/' . $model_id ?>" >Model Video </a></li>
<!--                        <li id='li_photo' ><a href="<?php echo HTTP_ROOT . 'appadmins/create_photo/' .  $model_id ?>">Model photo</a></li>
                        <li id='li_url' ><a href="<?php echo HTTP_ROOT . 'appadmins/model_url/' .$model_id ?>" >Model URL</a></li>
                        
                        <li id='li_banner' ><a href="<?php echo HTTP_ROOT . 'appadmins/model_banner/' . $model_id ?>" >Model Banner</a></li>-->

                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane active">
                            <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>

                               
                                <input   required="required" id="model_id" name="model_id" type="hidden" value='<?php echo @$model_id; ?>'>
                                <input   required="required" id="id" name="id" type="hidden" value='<?php echo @$video_id; ?>'>

                                
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Chose Model <span style="color:#FF0000">*</span></label>
                                        <div class="col-sm-6">
                                            <?= $this->Form->select('model_id', $options, ['class' => "form-control", 'label' => false,'onchange'=>'setUrl(this.value)', 'default' => @$model_id]); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                               
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Video Name <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="video_name" required="required" data-error = 'Enter video_name' id="video_name" value="<?php echo @$editData->video_name; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Video length <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="video_durations" required="required" data-error = 'Enter video_length' id="video_length" value="<?php echo @$editData->video_durations; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">  Video type</label>
                                    <div class="col-sm-6">                                        
                                        <select name='is_tailer' id='is_tailer' class="form-control">
                                            <option value="Is tailer" <?php if(@$editData->is_tailer=="Is tailer"){ ?> selected="selected" <?php } ?>>Is tailer</option>
                                            <option value="Is live" <?php if(@$editData->is_tailer=="Is live"){ ?> selected="selected" <?php } ?>>Is live</option>
                                            <option value="Is bonus" <?php if(@$editData->is_tailer=="Is bonus"){ ?> selected="selected" <?php } ?>>Is bonus</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">  Video quality</label>
                                    <div class="col-sm-6">                                        
                                        
                                        <label class="checkbox-inline">
                                                <input type="checkbox" value="360p" name="video_quality[]" checked>360p
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="480p" name="video_quality[]" <?php if(in_array('480p', explode(",", @$editData->video_quality)) ){echo "checked";} ?>>480p(SD)
                                        </label>
                                        <label class="checkbox-inline">
                                                <input type="checkbox" value="720p" name="video_quality[]" <?php if(in_array('720p', explode(",", @$editData->video_quality)) ){echo "checked";} ?>>720p(HD)
                                        </label>
                                        <label class="checkbox-inline">
                                                <input type="checkbox" value="Full HD" name="video_quality[]" <?php if(in_array('Full HD', explode(",", @$editData->video_quality)) ){echo "checked";} ?>>1080p(FHD)
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="4K" name="video_quality[]" <?php if(in_array('4K', explode(",", @$editData->video_quality)) ){echo "checked";} ?>>2160p(4K)
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">  Video Tags</label>
                                    <div class="col-sm-6">                                      
                                        <textarea name="tags" class="form-control" data-error = 'Enter video tags' placeholder="Ex:- Old and Young, Reality, Shaved, Bit, Tits"><?php echo @$editData->tags; ?></textarea>                                        
                                    </div>

                                </div>
                                <?php if (isset($video_id) && !empty($video_id)) { ?>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label"></label>
                                        <video width="300" control>
                                            <source src="<?php echo HTTP_ROOT. VIDEOS.@$editData->model_id.'/'.@$editData->video_file?>" type="video/mp4">
                                           
                                        </video>
                                       
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Video files<span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-2">
                                        <input type="file" name='video_filess' id='video_files'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Release Date <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-5">
                                        <input class="form-control release_date"  required="required" data-error = 'Enter model video release date' id="release_date" name="release_date" type="text"  autocomplete="off" value="<?=@$editData->release_date;?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <span style="padding-top: 3px; display: block; color: red"> "Video should be used mp4" </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name='gn_save' id='event_save' value="2" class="btn btn-danger">Save</button>  

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
                    <h3 class="box-title">Video Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Video Durations</th>
                                <th>Type</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php foreach ($dataListings as $list): ?>
                                <tr>

                                    <td style="text-align:  left;"> <?php echo $list->video_name; ?></td>
                                    <td style="text-align:  left;"><?php echo $list->video_durations; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->is_tailer; ?> </td>

                                    <td style="text-align: center; width: 20%">
                                        <?php // echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_video', $list->model_id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        <?php // echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-youtube-play')), ['action' => '#', '', ''], ['escape' => false, "data-placement" => "top", "data-hint" => "Add video", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/ModelVideos'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/ModelVideos'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                <?php } ?>

    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'ModelVideos'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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
function setUrl(id){
  
    window.location.href='<?php echo HTTP_ROOT.'appadmins/create_video/' ?>'+id;
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
