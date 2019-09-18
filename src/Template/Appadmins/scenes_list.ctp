<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
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
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Scenes List </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/scenes"><i class="fa fa-list"></i> Create Scenes</a></li>
        </ol>
    </section>
    
    <section class="content">
      <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Scenes Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>                              
                                <th></th>
                                <th>Name</th>
                                <th>Scenes ID</th>
                                <th>Release Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php  foreach ($dataListings as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>
                                    <td style="text-align:  left;"> <?php echo $list->scene_name; ?></td>
                                     <td style="text-align:  left;"> <?php echo $this->User->number_pad($list->id); ?></td>
                                    <td style="text-align:  left;"><?php echo date("d-M-Y", strtotime($this->Time->format( $list->releasedate ,'Y-MM-d'))); ?> </td>
                                    <td style="text-align: center; width: 20%">
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-retweet')), ['action' => 'updatefolder',$this->User->makeSeoUrl($list->scene_name).'-'.$list->id], ['escape' => false, "data-placement" => "top", 'data-toggle'=>"tooltip", 'title'=> "Get file from FTP", 'class' => 'btn btn-warning', 'style' => 'padding: 0 7px!important;']); ?>
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-picture-o')), ['action' => 'scenesphoto_gallery', $list->id], ['escape' => false, "data-placement" => "top",'data-toggle'=>"tooltip", 'title'=>"Photo gallary", 'class' => 'btn btn-info', 'style' => 'padding: 0 7px!important;']); ?>
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'scenes', $list->id], ['escape' => false, "data-placement" => "top",'data-toggle'=>"tooltip", 'title'=>"Edit", 'class' => 'btn btn-info', 'style' => 'padding: 0 7px!important;']); ?>
                                        

                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/Scenes'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top",'data-toggle'=>"tooltip", 'title'=> "Active", 'class' => "btn btn-success", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/Scenes'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", 'data-toggle'=>"tooltip", 'title'=> "Inactive", 'class' => "btn btn-danger", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'Scenes'], ['escape' => false, "data-placement" => "top", 'data-toggle'=>"tooltip", 'title'=> "Delete", 'class' => 'btn btn-danger', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                    </table>
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