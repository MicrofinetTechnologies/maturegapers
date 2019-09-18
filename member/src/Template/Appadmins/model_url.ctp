
<div class="content-wrapper">
    <section class="content-header">
        <h1>Model URL </h1>
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

                        <li id='li_url' class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/model_url/' .  @$model_id ?>" >Model URL</a></li>


                    </ul>
 <form action="" id="url_data" name="url_data"  method="post" data-toggle="validator" novalidate="true">
                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane active">
                           
                                <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Chose Model <span style="color:#FF0000">*</span></label>
                                        <div class="col-sm-6">
                                            <?= $this->Form->select('model_id', $options, ['required'=>'required','data-error' => 'Select Model','class' => "form-control", 'label' => false,'onchange'=>'setUrl(this.value)', 'default' => @$model_id]); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
        <div class="controls1">
         <div role="form" autocomplete="off">
             <div class="entry1 input-group" style="    width: 78%;">
           <div class="form-horizontal">
            
               
            <div class="col-sm-12">
             <div class="form-group">
              <label for="inputName" class="col-sm-3 control-label" style="text-align: left;    width: 21%;">Url  <span style="color:#FF0000">*</span> </label>
              <div class="col-sm-9">
               <div role="form" autocomplete="off">
                <input class="form-control" id="tkt_price" name="url[]" required="required" data-error = 'Enter Model Url' type="text" style="width: 79%;"/>
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
            
            <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label" style="text-align: left;">Release Date <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control release_date"  required="required" data-error = 'Enter model url release date' id="release_date" name="release_date" type="text"  autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
         <div class="col-sm-12">
          <div class="form-group">
           
              <button type="submit" id="save" class="btn btn-danger" >Save</button>
             
          </div>
         </div>

        </div>
      
                        </div>

                    </div>
         </form>

                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">Url Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl no.</th>
                                <th>url</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php $i=1; foreach($urls_lists as $vals){ ?>
                            <tr>
                                <td><?=$i++; ?></td>
                                <td><?= $vals->url;?></td>
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
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                        } );
                    } );
</script>

<script>
function setUrl(id){
  
    window.location.href='<?php echo HTTP_ROOT.'appadmins/model_url/'?>'+id;
}
</script>



<script>
 $(function()
 {
  $(document).on('click','.btn-add',function(e){
   e.preventDefault();
   var controlForm=$('.controls1 div:first'),
           currentEntry=$(this).parents('.entry1:first'),
           newEntry=$(currentEntry.clone()).appendTo(controlForm);
   newEntry.find('input').val('');
   controlForm.find('.entry1:not(:last) .btn-add')
           .removeClass('btn-add').addClass('btn-remove')
           .removeClass('btn-success').addClass('btn-danger')
           .html('<span class="glyphicon glyphicon-minus"></span>');
  }).on('click','.btn-remove',function(e)
  {
   $(this).parents('.entry1:first').remove();
   e.preventDefault();
   return false;
  });
 });</script>


<script>
$(document).ready(function() {
    $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
    
});
</script>