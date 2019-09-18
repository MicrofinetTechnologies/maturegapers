<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Home CMS </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/home_cms"><i class="fa fa-list"></i> Home CMS</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?=$this->Form->create(null,['type'=>'post']);?>
                        <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Header Text <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control ckeditor"  required="required" data-error = 'Enter header' id="release_date" name="header" type="text"  autocomplete="off"><?=@$editData->header;?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                        </div>
                    
                        <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Description Text <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control ckeditor"  required="required" data-error = 'Enter description' id="release_date" name="description" type="text"  autocomplete="off"><?=@$editData->description;?></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        </div>
                    
                    
                    <?=$this->Form->end();?>
                </div>
            </div>

        </div>
      
    </section>

</div>
