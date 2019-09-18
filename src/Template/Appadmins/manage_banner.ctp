<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/bannerOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<?php

  @$param2 = $this->request->params['pass'][1];

?>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Banner</h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
   <?php if ($id) { ?>
      <li class="active"><a  style="color: red;font-size: 15px;" id="edit-toggle"  class="active" href="<?php echo HTTP_ROOT . 'appadmins/manage_banner'; ?>"> <i class="fa fa-book"></i><?php echo "Edit  Banner"; ?></a></li>
     <?php } else { ?>
      <li class="active"><a  style="color: red;font-size: 15px;" onclick="$('#manage_banner').slideToggle(1000)" class="active" href="javascript:void(0);"> <i class="fa fa-book"></i><?php echo "Add New Banner"; ?></a></li>
     <?php } ?>
  </ol>
 </section>

 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div id="manage_banner" class="box box-default"  style="<?php echo ($param2) ? 'border-top: none; display: block;' : 'border-top: none; display: none;'; ?>">
      <div class="box-header with-border1">
       <h3 class="box-title">
        <?php

          if ($id) {
           echo "Edit Banner";
          } else {
           echo "Add Banner";
          }

        ?>
       </h3>
       <div class="box-tools pull-right">
        <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
       </div>
      </div><!-- /.box-header -->
      <div class="box-body" style="display: block;">
       <div class="row">
        <div class="col-xs-12">
         <!-- general form elements -->
         <div class="box box-primary">

          <!-- form start -->

          <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform', 'type' => 'file')); ?>
          <div class="box-body">
           <p style="color: red;">All (*) fields are mandatory</p>
           <div class="col-md-8">
            <div class="form-group">
             <label for="exampleInputFile">Title</label>
             <?= $this->Form->input('title', ['placeholder' => "Enter title", 'class' => "form-control", 'label' => false, 'value' => @$editBanner->title, 'data-error' => 'Please enter title', 'maxlength' => 50]); ?>
             <p style="font-size: 12px;">Note: <span>Title should not be more than 50 char</span>.</p>
            </div>
            <div class="help-block with-errors"></div>
           </div>

           <div class="col-md-8">
            <!--<div class="form-group">-->
            <label for="exampleInputFile">Link </label>
            <?= $this->Form->input('link', ['placeholder' => "Enter link", 'class' => "form-control", 'label' => false, 'pattern' => '/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g)', 'autocomplete' => 'off', 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editBanner->link, 'data-error' => 'Please enter valid link']); ?>
            <div class="help-block with-errors"></div>
<!--            <p style="font-size: 12px;"><span></span>.</p>-->
            <!--</div>-->
           </div>

           <?php if (@$editBanner->image) { ?>
              <div class="col-md-8">
               <img src="<?php echo HTTP_ROOT . BANNER_IMAGES; ?><?php echo $editBanner->image; ?>" style="width: 500px;"/>
               <p><a onclick="return confirm('Are you sure want to delete ?')" href="<?php echo HTTP_ROOT . 'appadmins/banner_delete/' . $id ?>"><img src="<?php echo HTTP_ROOT . 'img/trash.png' ?>"/></a></p>
              </div>
             </div>
            <?php } else { ?>
             <div class="col-md-8">
              <div class="form-group">
               <label for="exampleInputFile">Image<span style="color: red;">*</span></label>
               <?= $this->Form->input('image', ['type' => 'file', 'id' => 'image', 'placeholder' => "Browse image", 'class' => "form-control-file", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editBanner->image, 'data-error' => 'Browse Banner image', 'onchange' => "return validateImgExt('image')"]); ?>
               <div class="help-block with-errors"></div>
               <p style="font-size: 15px;">Note: <span>For good  resolution image size(<b>1820 width X 520 height</b>)</span>.</p>
              </div>
             </div>
            <?php } ?>
         </div>
         <div class="box-footer">
          <?php if ($id) { ?>
             <?= $this->Form->button('Update', ['class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
             <a class="btn btn-default" style="margin-left:10px;" href="<?php echo HTTP_ROOT; ?>appadmins/manage_banner">Cancel</a>
            <?php } else { ?>
             <?= $this->Form->button('Add Banner', ['class' => 'btn btn-success', 'id' => 'add', 'style' => 'margin-left:15px;']) ?>
            <?php } ?>
         </div>
         <?= $this->Form->end() ?>
        </div><!-- /.box -->
       </div>
      </div><!-- /.row -->
     </div><!-- /.box-body -->

    </div>
    <div class="box-header">
     <h3 class="box-title">Banner Listing</h3>
    </div>

    <div class="box-body">
     <table id="example1" class="table table-bordered table-striped">
      <thead>
       <tr>

        <th></th>
        <th>Title</th>
        <th>Image</th>
        <th>Link</th>
        <th>Description</th>
        <th style="text-align: center;">Action</th>
       </tr>
      </thead>
      <tbody id="list">
       <?php foreach ($bannerListings as $bannerDetail): ?>
          <tr id="arrayorder_<?php echo $bannerDetail->id; ?>" class="message_box ui-sortable-handle">
           <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
           <td style="text-align:  left;"> <?php echo $bannerDetail->title; ?></td>
           <td style="text-align:  left;">
            <img src="<?php echo ($bannerDetail->image) ? HTTP_ROOT . BANNER_IMAGES . $bannerDetail->image : HTTP_ROOT . 'img/noimage.png'; ?>" style="width: 120px;" alt="No image"/>
           </td>
           <td style="text-align:  left;"> <?php echo $bannerDetail->link; ?></td>
           <td style="text-align:  left;"> <?php echo $bannerDetail->short_description; ?></td>
           <td style="text-align: center; width: 20%">
            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'manageBanner', $bannerDetail->id, 'banners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
            <?php if ($bannerDetail->is_active == 1) { ?>
             <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $bannerDetail->id . '/Banners'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', [ "data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
            <?php } else { ?>
             <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $bannerDetail->id . '/Banners'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
            <?php } ?>
            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $bannerDetail->id, 'Banners'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
           </td>
          </tr>
         <?php endforeach; ?>
      </tbody>
     </table>
    </div><!-- /.box-body -->
   </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
 $(document).ready(function(){
  var Url=window.location.href;
  var splitUrl=Url.split('/')[6];
  validateImo(splitUrl);
  return false;
 });
 function validateImo(splitUrl){
  $('#bannerform').validator().on('submit',function(){
   if(splitUrl){
    $(':button[type="submit"]').prop('disabled',false);
   }else{
    $(':button[type="submit"]').prop('disabled',true);

   }
  })
 }
 $('#edit-toggle').on('click',function (e) {
 e.preventDefault();
         $('#manage_banner').slideToggle(1000);
         $("#bannerform")[0].reset.click();
//        $("#bannerform.frm").trigger('reset')
 }
 $('#edit-toggle').click(function() {
 $('#LoadMe').load($(this).attr('href'));
         return false;
 });


</script>
