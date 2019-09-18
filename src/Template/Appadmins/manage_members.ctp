<div class="content-wrapper">

<section class="content-header">
  <h1>New Members  </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-body">
        <?=$this->Form->create('',['type'=>'post']);?>
        <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">User Name <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('username', ['autocomplete'=>'off','type'=>'text','placeholder' => "Enter user name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on",  'required' => "required", 'data-error' => 'Enter memberships name']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleInputName">Password <span style="color: red;">*</span></label>
                                        <?= $this->Form->input('password', ['autocomplete'=>'off','type'=>'password','placeholder' => "Enter password", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on",  'required' => "required", 'data-error' => 'Enter Password']); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <input type='submit' class='btn btn-success' value="Submit">
                                    </div>
                                
        <?=$this->Form->end();?>
     </div>
    </div>
   </div>
  </div>
 </section>
    
    
 <section class="content-header">
  <h1>Members Listing  </h1>

 </section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th style="display: none">Id</th>
         <th>Name</th>
         <th style="text-align: center;">Action</th>
        </tr>
       </thead>
       <tbody>
        <?php foreach ($allmemb as $pages): ?>
           <tr>
            <td style="display: none"><?= h($pages->id) ?></td>
            <td><?= h($pages->username) ?></td>
            <td style="text-align: center;">
             <?php //echo $id = $user->id; ?>
             
                <!--<a href="<?=HTTP_ROOT;?>appadmins/manage_members/<?=$pages->id;?>" data-placement="top" data-hint="Update" class="btn btn-info  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>-->
                <a href="<?=HTTP_ROOT;?>appadmins/delete/<?=$pages->id;?>/Dbtable" data-placement="top" data-hint="Delete" class="btn btn-danger  hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-trash"></i></a>
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
