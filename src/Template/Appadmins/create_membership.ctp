<div class="content-wrapper">
    <section class="content-header">
        <h1> Manage  Memberships </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/create_membership"><i class="fa fa-list"></i> Create Memberships</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    

                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="box box-primary">

                            <?= $this->Form->create(null, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                            <div class="box-body">
                                <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputName">Memberships Name <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('id', ['type'=>'hidden','value'=>@$editData->id, 'required' => "required"]); ?>
                                        <?= $this->Form->input('memberships_name', ['placeholder' => "Enter scene name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value'=>@$editData->memberships_name, 'required' => "required", 'data-error' => 'Enter memberships name']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputName">Price  <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('m_price', ['placeholder' => "Enter price", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value'=>@$editData->m_price, 'required' => "required", 'data-error' => 'Enter  a price']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                 <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputName">Durations <span style="color: red;">*</span></label>
                                     
                                        <?= $this->Form->input('duration', ['placeholder' => "Enter duration", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value'=>@$editData->duration, 'required' => "required", 'data-error' => 'Enter  durations']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div><br>
                                
                                <div>
                                     <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputName">URL <span style="color: red;">*</span></label>
                                     
                                        <?= $this->Form->input('url', ['placeholder' => "Enter Url", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value'=>@$editData->url, 'required' => "required", 'data-error' => 'Enter  url']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                </div>




                            </div>
                            <div class="box-footer">

                                <?php
                                if($id){
                                     echo $this->Form->button('Update ', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                }else {
                                echo $this->Form->button('Save', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
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
    <section class="content">
      <div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                    <h3 class="box-title">Memberships Listing</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               
                                
                                <th>Name</th>
                                <th>Price</th>
                                <th>Durations</th>
                                <th>Url</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php  foreach ($dataListings as $list): ?>
                                <tr>
                                   
                                    <td style="text-align:  left;"> <?php echo $list->memberships_name; ?></td>
                                    <td style="text-align:  left;"><?php echo $list->m_price; ?> </td>
                                    <td style="text-align:  left;"><?php echo $list->duration; ?> /Month </td>
                                    <td style="text-align:  left;"><?php echo $list->url; ?> </td>
                                    <td style="text-align: center; width: 20%">
                                        <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'create_membership', $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        

                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/Memberships'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/Memberships'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'Memberships'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                    </td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>
</div>






