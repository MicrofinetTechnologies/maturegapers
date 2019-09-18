<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/eventOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<!--POPUP-->
<div class="modal" id="add-event"></div>
<!--Popup END-->

<div class="content-wrapper">
 <section class="content-header">
  <h1>Manage Events</h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-home"></i> Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'appadmins/create_events'; ?>"><i class="fa fa-dashboard"></i> Create Event</a></li>
  </ol>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
      <h3 class="box-title"> Events Listing</h3>
     </div>
     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th></th>
         <th>Event name</th>
         <!--<th>Event duration</th>-->
         <th>Event create date</th>
         <th style="text-align: center;">Action</th>
        </tr>
       </thead>
       <tbody id="list">
        <?php foreach ($getDatas as $data): ?>
           <tr id="arrayorder_<?php echo $data->id; ?>" class="message_box ui-sortable-handle">

            <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
            <td style="text-align:left;"><?php echo $data->name; ?></td>
            <!--<td style="text-align:left;"><?php echo $data->duration; ?></td>-->
            <td style="text-align:left;"><?php echo date('d-m-Y', strtotime($data->created)); ?></td>
            <td style="text-align: center; width: 20%">
             <label data-hint="Upcoming Nights set" class="hint--top  hint" >
              <input id="<?php echo $data->id ?>" type="checkbox" <?php if ($data->is_featured == 1) { ?> checked="checked" <?php } ?>class="flat-red">
             </label>
             <a href="<?php echo HTTP_ROOT . 'appadmins/ticket_information/' . $data->id; ?>" data-placement="top" data-hint="Ticket" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-ticket"></i></a>
             <a href="<?php echo HTTP_ROOT . 'appadmins/create_events/' . $data->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
              <?php if ($data->status == 1) { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $data->id . '/Events'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', [ "data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
             <?php } else { ?>
              <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $data->id . '/Events'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
             <?php } ?>
             <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $data->id, 'Events'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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
<script src="<?php echo HTTP_ROOT; ?>plugins/iCheck/icheck.min.js"></script>
<script>
 $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass:'icheckbox_flat-green',
  radioClass:'iradio_flat-green',
 });
 $('input').on('ifChecked',function(event){
  var id=this.id;
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_upcoming_nights_set',
    data:{id:id,type:1},
    success:function(data){
     if(data){
      location.reload();
     }
    }
   });
  }
 });
 $('input').on('ifUnchecked',function(event){
  var id=this.id;
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_upcoming_nights_set',
    data:{id:id,type:0},
    success:function(data){
     if(data){

     }
    }
   });
  }
 });

 function getDetails(id){
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_event_list',
    data:{id:id},
    success:function(data){
     if(data){
      $('#add-event').show('slow');
      $('#add-event').html(data);
     }
    }
   });
  }

 }
 function getDateTime(id){
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_date_time',
    data:{id:id},
    success:function(data){
     if(data){
      $('#add-event').show('slow');
      $('#add-event').html(data);
     }
    }
   });
  }
 }
 function getTicket(id){
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_ticket',
    data:{id:id},
    success:function(data){
     if(data){
      $('#add-event').show('slow');
      $('#add-event').html(data);
     }
    }
   });
  }
 }
 function getPhoto(id){
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_photo',
    data:{id:id},
    success:function(data){
     if(data){
      $('#add-event').show('slow');
      $('#add-event').html(data);
     }
    }
   });
  }
 }
 function getVideo(id){
  if(id){
   var pageUrl=$('#pageurl').val();
   $.ajax({
    type:'post',
    url:pageUrl+'appadmins/ajax_video',
    data:{id:id},
    success:function(data){
     if(data){
      $('#add-event').show('slow');
      $('#add-event').html(data);
     }
    }
   });
  }
 }




</script>
