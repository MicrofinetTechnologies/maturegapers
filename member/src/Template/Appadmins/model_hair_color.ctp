<div class="content-wrapper">
    <section class="content-header">
        <h1>Model Hair Color</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?=$this->Form->create(null,['type'=>'post']);?>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-9">
                            <div class="form-group" >
                                <label for="color">Hair Color</label>
                                <input type="text"  name="color"  id="color" class="form-control">  
                            </div>                   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-9">
                            <div class="form-group" >
                                
                                <input type="submit"  name="submit"  value="submit" class="btn btn-success">  
                            </div>                   
                        </div>
                    </div>
                    <?=$this->Form->end();?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Model Hair Color Listing</h3>
                    
<!--                    <div style="font-weight:400;"><small class="text-danger" >N.B:- 1st Order will be the cover photo of Model.</small></div>-->
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Sl no.</th>
                                <th>Name</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
<?php $i=1; foreach ($list as $lists): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                   
                                    <td style="text-align:  left;"> <?php echo $i++; ?></td>
                                    <td style="text-align:  left;"><?php echo $lists->color; ?> </td>
                                    

                                    <td style="text-align: center; width: 20%">                                        
                                        
                                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $lists->id, 'Color'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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