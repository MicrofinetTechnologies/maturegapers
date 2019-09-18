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
        <h1> Models List</h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/model_setting"><i class="fa fa-list"></i> Models List</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Model Listing</h3>
                    <div style="font-weight:400;"><small class="text-danger" >N.B:- According to "Order" position Models will appear in Model Page.</small></div>
<!--                    <div style="font-weight:400;"><small class="text-danger" >N.B:- 1st Order will be the cover photo of Model.</small></div>-->
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Real Name</th>
                                <th>Birth Date</th>
                                <th>Hair color</th>

                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
<?php foreach ($dataListings as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"><?php echo $list->sort_order; ?></span></td>
                                    <td style="text-align:  left;"> <?php echo $this->User->number_pad($list->id); ?></td>
                                    <td style="text-align:  left;"> <?php echo $list->model_name; ?></td>
                                    <td style="text-align:  left;"><?php echo $list->age; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->gender; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->model_real_name; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->birth_date; ?> </td>

                                    <td style="text-align:  left;"><?php echo $list->hair; ?> </td>
                                    

                                    <td style="text-align: center; width: 20%">
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-picture-o')), ['action' => 'create_photo', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Picture section", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-gears')), ['action' => 'model_mouseover', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Model Basic Setting", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        
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