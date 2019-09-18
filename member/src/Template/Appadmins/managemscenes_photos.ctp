<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/scenesphotoOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Scene Gallery Photos</h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
     <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Photo Gallery Listing</h3>
                    <div style="font-weight:400;"><small class="text-danger" >N.B:- According to order position images will appear in Model Photo Gallery.</small></div>
                    <div style="font-weight:400;"><small class="text-danger" >N.B:- 1st Order will be the cover photo of Model.</small></div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>Order Position</th>
                                <th>Gallery Name</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php foreach ($dataListings as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"></span>
                                    </td>
                                    
                                    <td style="text-align:  left;"><img width="50" src="<?php echo HTTP_ROOT.PHOTOS.'scenes/'.@$id.'/'.$list->gal_name.'/'.$list->files_name;?>" >
                                    </td> 
                                    <td style="text-align: center; width: 20%">
<!--                                        <a href="<?php echo HTTP_ROOT . 'appadmins/scenemainPhoto/' . $list->id . '/ScenesPhotos'; ?>">
                                        <button data-placement= "top" data-hint = "<?php if($list->pro_pic == 0){echo "Set as Main Photo";}else{echo "Already Used.";} ?>"  class = "btn <?php if($list->pro_pic == 0){echo "btn-danger";}else{echo "btn-info";} ?>  hint--top  hint" style = 'padding: 0 7px!important;'> <i class="fa fa-file-image-o"></i></button></a>-->
                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/ScenesPhotos'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/ScenesPhotos'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'ScenesPhotos'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <a class="cxa btn btn-warning" href="<?=HTTP_ROOT.'appadmins/scenesphoto_gallery';?>" class="next"> &laquo; Back</a>
                </div>
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
<style>
.cxa {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

.cxa:hover {
    background-color: #ddd;
    color: red;
}

.next {
    background-color: #4CAF50;
    color: white;
}



.round {
    border-radius: 50%;
}
</style>