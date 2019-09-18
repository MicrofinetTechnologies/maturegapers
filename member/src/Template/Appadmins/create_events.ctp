<style>
 #event_chose_date {padding: 0; list-style: none;}
 #event_chose_date li {padding: 5px 35px 5px 15px; margin: 0 5px 5px 0; width: 115px; float: left; background: #f1f1f1; border: 1px solid #e1e1e1; position: relative; color: #999;}
 #event_chose_date li span {padding: 10px; position: absolute; right: 0; top: 0; bottom: 0; line-height: 7px; cursor: pointer; color: red; background: #FFF;}
 .entry {float: left !important;}
 .day-event{margin: 0 5px 5px 0; padding: 5px 50px 5px 20px; width: auto !important; position: relative; background: #f1f1f1; border: 1px solid #e1e1e1;}
 .day-event .closeTime {position: absolute; right: 0; top: 0; bottom: 0; padding: 10px; background: #FFF; line-height: 7px;}
 .day-event p {margin: 0; font-size: 13px; color: #999;}
 .photosAdmin {list-style: none; padding: 0; margin: 0;}
 .photosAdmin li {}
 .photosAdmin li div {border: 1px solid #e1e1e1; display: flex; flex-direction: column; justify-content: center; overflow: hidden; height: 150px; position: relative;}
 .photosAdmin li img {max-width: 100%;}
 .photosAdmin li div a {position: absolute; right: 0; top: 0; background: rgba(255, 255, 255, 0.5); padding: 10px; line-height: 5px;}
</style>
<?php if ($id) { ?>
   <style>
    .day-event{ display: block!important;}
   </style>
  <?php } ?>
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>admin-assets/css/style-personal.css">
<?php if ($id) { ?>
   <script src="<?php echo HTTP_ROOT ?>admin-assets/js/edit-simplecalendar.js" type="text/javascript"></script>
  <?php } else { ?>
   <script src="<?php echo HTTP_ROOT ?>admin-assets/js/add-event-simplecalendar.js" type="text/javascript"></script>
  <?php } ?>
<script src="<?php echo HTTP_ROOT ?>admin-assets/js/event.js" type="text/javascript"></script>
<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?php if ($id) { ?>
      Edit event
     <?php } else { ?>
      Create event
     <?php } ?>
  </h1>
  <ol class="breadcrumb">
   <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/manage_events"><i class="fa fa-list"></i> Manage events</a></li>
  </ol>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs">
      <li id='li_general' class="active"><a href="#general" data-toggle="tab" aria-expanded="false">General information </a></li>
      <li id='li_schedule'><a href="#schedule" data-toggle="tab" aria-expanded="false">Event schedule</a></li>
      <li id='li_ticket'><a href="#ticket" data-toggle="tab" aria-expanded="true"> Event ticket</a></li>
      <li id='li_photo'><a href="#photo" data-toggle="tab" aria-expanded="true">Event photo</a></li>
      <li id='li_video'><a href="#video" data-toggle="tab" aria-expanded="true">Event video</a></li>
     </ul>

     <div class="tab-content" style="width: 100%;float: left;">

      <div class="tab-pane active" id="general">
       <div id="msg-gen"></div>
       <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>
        <div class="form-group">
         <label for="inputName" class="col-sm-2 control-label">Event Name <span style="color:#FF0000">*</span></label>
         <div class="col-sm-10">
          <input class="form-control"  required="required" data-error = 'Enter event name' id="event_name" name="event_name" type="text" value='<?php echo @$editData->name; ?>'>
          <div class="help-block with-errors"></div>
         </div>
        </div>
        <div class="form-group">
         <label for="inputEmail" class="col-sm-2 control-label">Descriptions <span style="color:#FF0000">*</span></label>
         <div class="col-sm-10">
          <textarea class="form-control" name="event_description" required="required" data-error = 'Enter event description' id="event_description"><?php echo @$editData->description; ?></textarea>
          <div class="help-block with-errors"></div>
         </div>
        </div>

        <?php if ($id) { ?>
           <input type="hidden" id="eid" name="eid" value="<?php echo $editData->id; ?>"/>

           <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label"> Events Cover Img</label>
            <?php if (!empty($editData->image)) { ?>
             <div class="col-sm-8">
              <img width="170" src='<?php echo HTTP_ROOT . COVER_PHOTO . $editData->image ?>'>
             </div>
             <div class="col-md-6" style='text-align: center;'>
              <a href='<?php echo HTTP_ROOT . 'appadmins/change_coverphoto/' . $editData->id ?>'><img  src='<?php echo HTTP_ROOT ?>img/trash.png'></a>
             </div>
            <?php } else { ?>
             <div id="img-cover"></div>
             <div class="col-sm-5" id="inputFiles">
              <input type="file" name='event_photo' id='event_photo'>
             </div>

            <?php } ?>
           </div>
          <?php } else { ?>
           <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label"> Events Cover Img</label>
            <div class="col-sm-2">
             <input type="file" name='event_photo' id='event_photo'>
            </div>
            <div class="col-sm-8">
             <span style="padding-top: 3px; display: block; color: red"> "Image size ratio must be Width 500px X Height 550px,should be used JPG,PNG and GIF image" </span>
            </div>
           </div>
          <?php } ?>
        <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
          <?php if ($id) { ?>
             <button type="submit" name='event_save' id='event_save' class="btn btn-danger">Save</button>
            <?php } else { ?>
             <button type="submit" name='event_save' id='event_save' class="btn btn-danger">Save & Continue</button>
            <?php } ?>
         </div>
        </div>
       </form>
      </div>
      <div class="tab-pane" id="schedule">
       <form class="form-horizontal"  id="frm_sechudle_time" name="frm_sechudle_time" action="" method="POST">
        <div id="error_msg_date" class="help-block with-errors"></div>
        <div class="form-group" id="calenderAjax">
         <label for="inputName" class="col-sm-2 control-label">Event Date  <span style="color:#FF0000">*</span></label>
         <div class="col-sm-4">
          <div class="calendar hidden-print">
           <div class="calendarHead">
            <h2 class="month"></h2>
            <a class="btn-prev fontawesome-angle-left" href="#"></a>
            <a class="btn-next fontawesome-angle-right" href="#"></a>
           </div>
           <table>
            <thead class="event-days">
             <tr></tr>
            </thead>
            <tbody class="event-calendar">
             <tr class="1"></tr>
             <tr class="2"></tr>
             <tr class="3"></tr>
             <tr class="4"></tr>
             <tr class="5"></tr>
            </tbody>
           </table>


          </div>
         </div>
         <div class="col-sm-6">
          <div style='display:none;' id="multi_date_html"></div>
          <input type="hidden" value="" id="multi_date" name="multi_date"/>
          <input type='hidden' id='event_text_id' name="event_text_id" value="">
          <?php if ($id) { ?>
             <input type="hidden" id="select_date" name="select_date" value=""/>
             <input type="hidden" id="event_id_sechudle" name="event_id_sechudle" value="<?php echo $id; ?>"/>
            <?php } ?>
          <?php if (!$id) { ?>
             <div id="timeSet" style="display:none;">
              <div class="col-sm-12">
               <label for="inputEmail" class="control-label" style="text-align: left; margin-bottom: 10px;">Event Date</label>
               <ul id="event_chose_date"></ul>
              </div>
             </div>
            <?php } else { ?>
             <div id="timeSet">
              <div class="col-sm-12">
               <label for="inputEmail" class="control-label" style="text-align: left; margin-bottom: 10px;">Event Date</label>
               <ul id="event_chose_date"></ul>
              </div>
              <div class="col-sm-12">
               <div class="list"></div>
              </div>

             </div>

            <?php } ?>


         </div>
        </div>
        <div class="form-group">
         <div class="col-sm-offset-6">
          <?php if ($id) { ?>
             <button type="submit"  id='date_save_button' name="date_save_button" class="btn btn-danger" style="margin-left: 15px;">Save</button>
            <?php } else { ?>
             <button type="submit"  id='date_save_button' name="date_save_button" class="btn btn-danger" style="margin-left: 15px;">Save & next</button>
            <?php } ?>
         </div>
        </div>
       </form>
      </div>

      <div class="tab-pane " id="ticket">
       <div id="ticket-msg"></div>

       <form action="" id="frm_ticket" name="frm_ticket" method="post" data-toggle="validator" novalidate="true">
        <div class="controls1">
         <div role="form" autocomplete="off">
          <div class="entry1 input-group">
           <div class="form-horizontal">
            <div class="col-sm-4 ">
             <div class="form-group">
              <label for="inputName" class="col-sm-4 control-label">Ticket Type  <span style="color:#FF0000">*</span></label>
              <div class="col-sm-8">
               <input class="form-control" required="required" data-error = 'Enter ticket category' name="tkt_type[]" id="inputName"  type="text">
               <div class="help-block with-errors"></div>
              </div>
             </div>
            </div>
            <div class="col-sm-4">
             <div class="form-group">
              <label for="inputEmail" class="col-sm-6 control-label">Number of Ticket  <span style="color:#FF0000">*</span> </label>
              <div class="col-sm-6">
               <input class="form-control" required="required" data-error = 'Enter No. of tickets available' name="tkt_available[]" id="ticketAvailable"  type="text">
               <div class="help-block with-errors"></div>
              </div>
             </div>
            </div>
            <div class="col-sm-4">
             <div class="form-group">
              <label for="inputName" class="col-sm-3 control-label">Price  <span style="color:#FF0000">*</span> </label>
              <div class="col-sm-9">
               <div role="form" autocomplete="off">
                <input class="form-control" id="tkt_price" name="tkt_price[]" required="required" data-error = 'Enter ticket price' type="text" style="width: 79%;"/>
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
         <div class="col-sm-12" style="padding-bottom:10px;"> <input type="checkbox" <?php if (@$editData->is_free_entry == 1) { ?> checked="checked" <?php } ?>name="chk_free" value="1" id="chk_free"> For free entry event, please check this</div>
         <div class="col-sm-12">
          <div class="form-group">
           <?php if ($id) { ?>
              <input type='hidden' id='event_id_ticket' name="event_id_ticket" value="<?php echo $id; ?>">
              <button type="submit" id="btn_tkt" class="btn btn-danger" >Save</button>
             <?php } else { ?>
              <button type="submit" id="btn_tkt" class="btn btn-danger" >Save & Continue</button>
             <?php } ?>
          </div>
         </div>

        </div>
       </form>


       <?php if ($id) { ?>
          <!--##########-->
          <div class="col-xs-12" id="tkt_list">
           <div class="box">
            <!--            <div class="box-header">
                         <h3 class="box-title">Event ticket details</h3>
                         <div class="box-tools"></div>
                        </div> /.box-header -->
            <div class="box-body table-responsive no-padding">
             <table class="table table-hover">
              <tbody><tr>
                <th>Ticket Type</th>
                <th>Number of Ticket</th>
                <th>Ticket Price</th>
                <th>Date</th>
                <th style="text-align:center;">Action</th>
               </tr>
               <?php foreach ($events_tickets as $events_ticket) { ?>
                <tr id="tr<?php echo $events_ticket->id; ?>">
                 <td ><?php echo $events_ticket->ticket_type; ?></td>
                 <td><?php echo $events_ticket->noof_tickets; ?></td>
                 <td><?php echo number_format((float) $events_ticket->price, 2, '.', ''); ?></td>
                 <td><?php echo $events_ticket->created; ?></td>
                 <td style="text-align:center;"><a onclick="getTicektDelete(<?php echo $events_ticket->id; ?>)" href="javascript:void(0)">x</a></td>
                </tr>
               <?php } ?>
              </tbody>
             </table>
            </div><!-- /.box-body -->
           </div><!-- /.box -->
          </div>
          <!--############-->
         <?php } ?>
      </div>
      <div class="tab-pane" id="photo">
       <style>

       </style>
       <div id="photo-msg"></div>

       <?php if ($id) { ?>
          <input type='hidden' id='event_id_photo' name="event_id_photo" value="<?php echo $id; ?>">
          <div class="col-xs-12" id="ajax-photo">
           <ul class="photosAdmin">
            <?php foreach ($events_photos as $events_photo) { ?>
             <li class="col-sm-2" id="p<?php echo $events_photo->id; ?>">
              <div>
               <img src="<?php echo HTTP_ROOT . PHOTO . $events_photo->file_name; ?>"/>
               <br>
               <a onclick="getPhotoDelete(<?php echo $events_photo->id; ?>)"href="javascript:void(0)">x</a>
              </div>
             </li>
            <?php } ?>
           </ul>
          </div>
         <?php } ?>
       <form class="form-horizontal" action="" method="POST" id="frmPhoto" name="frmPhoto">

        <div class="form-group">
         <section class="content">
          <div class="row">
           <div class="col-xs-12">
            <input type="file" name="files">
            <p>"Image size ratio must be Width 500px X Height 550px,should be used JPG,PNG and GIF image" </p>
           </div>

          </div>
         </section>
        </div>
        <div class="form-group">
         <div class="col-sm-10">
          <?php if (!$id) { ?>
             <button type="submit" class="btn btn-danger">Save & Continue</button>
            <?php } ?>
         </div>
        </div>
       </form>
      </div>

      <div class="tab-pane" id="video">
       <div id="video-msg"></div>
       <?php if ($id) { ?>
          <div class="col-xs-12" id="video_list">
           <ul class="photosAdmin">
            <?php foreach ($events_videos as $events_video) { ?>
             <li class="col-sm-2" id="p<?php echo $events_video->id; ?>">
              <div>
               <img src="https://img.youtube.com/vi/<?php echo $this->Custom->getYoutubeId($events_video->link); ?>/0.jpg"/>
               <br>
               <a onclick="getVideoDelete(<?php echo $events_video->id; ?>)"href="javascript:void(0)">x</a>
              </div>
             </li>
            <?php } ?>
           </ul>
          </div>
         <?php } ?>
       <div class="col-xs-12" style="margin-top: 42px;">
        <form class="form-horizontal" action="" method="POST" name="vidForm" id="vidForm" data-toggle="validator" novalidate="true">
         <div class="form-group">
          <label for="inputEmail" class="col-sm-2 control-label">Youtube Link</label>
          <div class="col-sm-10 ">
           <div class="controls2">
            <div role="form" autocomplete="off">
             <div class="entry2 input-group col-xs-8" style="padding-bottom: 10px;">
              <input class="form-control video-class" name="video[]" id="video-inputbox" type="text" data-error = 'Enter ticket price' />
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

         <div class="col-sm-10 col-sm-offset-2">
          <?php if ($id) { ?>
             <input type='hidden' id='event_id_video' name="event_id_video" value="<?php echo $id; ?>">
            <?php } ?>
          <input type="button" value="Save & Publish" id='finish' name='finish' class="btn btn-danger"/>
          <input type="button" value="Save as Draft" id='saveDraft' name='saveDraft' class="btn btn-danger"/>
         </div>
        </form>
       </div>
      </div>
     </div>

     <!-- /.tab-pane -->
    </div>
   </div>
  </div>
 </section>
</div>
<script>
 $(function()
 {
  $(document).on('click','.btn-add',function(e){
   e.preventDefault();
   var controlForm=$('.controls div:first'),
           currentEntry=$(this).parents('.entry:first'),
           newEntry=$(currentEntry.clone()).appendTo(controlForm);
   newEntry.find('input').val('');
   controlForm.find('.entry:not(:last) .btn-add')
           .removeClass('btn-add').addClass('btn-remove')
           .removeClass('btn-success').addClass('btn-danger')
           .html('<span class="glyphicon glyphicon-minus"></span>');
   $('.timepicker').timepicker({showInputs:false,timePickerIncrement:15,format:'h:mm'});
  }).on('click','.btn-remove',function(e)
  {
   $(this).parents('.entry:first').remove();
   e.preventDefault();
   return false;
  });
 });</script>


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
 $(function()
 {
  $(document).on('click','.btn-add',function(e){
   e.preventDefault();
   var controlForm=$('.controls2 div:first'),
           currentEntry=$(this).parents('.entry2:first'),
           newEntry=$(currentEntry.clone()).appendTo(controlForm);
   newEntry.find('input').val('');
   controlForm.find('.entry2:not(:last) .btn-add')
           .removeClass('btn-add').addClass('btn-remove')
           .removeClass('btn-success').addClass('btn-danger')
           .html('<span class="glyphicon glyphicon-minus"></span>');
  }).on('click','.btn-remove',function(e)
  {
   $(this).parents('.entry:first').remove();
   e.preventDefault();
   return false;
  });
 });
 $(function(){
  $('#chk_free').change(function(){
   if($(this).prop('checked')){
    $('#inputName').removeAttr('required');
    $('#ticketAvailable').removeAttr('required');
    $('#tkt_price').removeAttr('required');
    $('#btn_tkt').removeClass('disabled');
    $('.form-group').removeClass('has-error');
    $('.help-block').html('');
   }else{
    $('#inputName').prop('required',true);
    $('#ticketAvailable').prop('required',true);
    $('#tkt_price').prop('required',true);
    $('#btn_tkt').addClass('disabled');
   }
  });
 });



</script>
<link href="<?php echo HTTP_ROOT ?>drag/jquery.fileuploader.css" media="all" rel="stylesheet">
<link href="<?php echo HTTP_ROOT ?>drag/jquery.fileuploader-theme-dragdrop.css" media="all" rel="stylesheet">
<script src="<?php echo HTTP_ROOT ?>drag/jquery.fileuploader.min.js" type="text/javascript"></script>
<script src="<?php echo HTTP_ROOT ?>drag/custom.js" type="text/javascript"></script>

<!--==============-->

