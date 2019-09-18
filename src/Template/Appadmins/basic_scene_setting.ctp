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
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list1").sortable({class: 'move', update: function () {
                var order = $('#list1').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/cover5photoorder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<script type="text/javascript">
//    var jq = $.noConflict();
    $(function () {
        var strURL = '<?php echo HTTP_ROOT; ?>';
        $("#list2").sortable({class: 'move', update: function () {
                var order = $('#list2').sortable('serialize');
                // alert(order);
                $.post(strURL + "appadmins/cover5photoorder", order, function (theResponse) {
                });
            }
        });
    });
</script>
<div class="content-wrapper">
 <section class="content-header">
  <h1> Basic Scene Setting</h1>
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
        <?=$this->Form->create(null,['type'=>'file','data-toggle'=>"validator"]);?>
            <div class="form-group">
                <label for="email">Scene</label>
                <?= $this->Form->select('scene_id', $options, ['class' => "form-control", 'label' => false,'onchange'=>'setUrl(this.value)', 'default' => @$id]); ?>                
                
            </div>
         <div class="form-group" style=" position: relative;">
                <label for="email">Select Cover Photos For Scene</label>
                <input type="file"  name="cover_photo[]"  id="cover_photo" multiple> 
                <div>
                    <small class="text-danger">
                    Upto 5 Photos are allowed For Cover and Mouse-over <br>Height: 330px & Width: 274px                  
                    </small>
                    
                </div>
                <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#1">Click Here to view Cover & mouse-over Image Listing</a></span>
            </div>
            
            <div class="form-group" style=" position: relative;">
                <label for="pwd">Select Scene Landing Page Photos</label>
                <input type="file" name="landing_photo[]"  id="landing_photo" multiple>
                <div>
                    <small class="text-danger">
                    Upto 4 Photos allowed  for Scene Landing Page<br>Height: 844px  & Width: 1277px                    
                    </small>                    
                </div>
                
                <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#2">Click Here to view Scene Landing Image Listing</a></span>
            </div>
         
            <div class="form-group" style=" position: relative;">
                <label for="pwd">Select Scene Landing Page Cover Photos </label>
                <input type="file"  id="landscroll_photo" name="landscroll_photo[]" multiple>
                <div>
                    <small class="text-danger">
                    1 Photo used For Scene Landing Page Scrolling section <br>Height: 844px  & Width: 1277px                 
                    </small>
                    <span style=" position: absolute; right: 20px; top: 50px;" class="right-section"><a class="text-warning" href ="#3">Click Here to view Scene cover photo Listing</a></span>
                    
                </div>
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
         
        <?=$this->Form->end();?>
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
                                    <td style="text-align:  center;"> <img src="<?php echo HTTP_ROOT.PHOTOS.$list->photo_name; ?>" width="80"></td>
                                   

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
 
 <section class="content" id="2">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Landing Scene 4 photos</h3>
                </div>
                <div class="box-body">
                    <table id="example4" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="text-align:  center;">Image</th>
                                
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list1">
                            <?php foreach ($home4pic as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>

                                    <td style="text-align:  center;"> <img src="<?php echo HTTP_ROOT.PHOTOS.$list->photo_name; ?>" width="80"></td>
                                    

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
 
 <section class="content" id="3">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Landing Scene single photo</h3>
                </div>
                <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="text-align:  center;">Image</th>
                                
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list2">
                            <?php foreach ($singlepic as $list): ?>
                                <tr  id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>

                                    <td style="text-align:  center;"> <img src="<?php echo HTTP_ROOT.PHOTOS.$list->photo_name; ?>" width="80"></td>
                                    

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
 
</div><!-- /.content-wrapper -->

<script>
function setUrl(id){
  
    window.location.href='<?php echo HTTP_ROOT.'appadmins/basic_scene_setting/' ?>'+id;
}
</script>
<script>
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[5,10, 25, 50,100, -1], [5,10, 25, 50,100, "All"]]
                        } );
                    } );
</script>

<script>
                    $(document).ready(function() {
                        $('#example4').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[4,10, 25, 50,100, -1], [4,10, 25, 50,100, "All"]]
                        } );
                    } );
</script>

<script>
                    $(document).ready(function() {
                        $('#example3').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[1,10, 25, 50,100, -1], [1,10, 25, 50,100, "All"]]
                        } );
                    } );
</script>