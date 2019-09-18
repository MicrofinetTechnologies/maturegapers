<div class="content-wrapper">
 <section class="content">


  <div class="row">
   <?php foreach ($eventLists as $list) { ?>
      <div class="col-md-4">
       <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
         <h3 class="box-title"><?php echo $list->event->name; ?></h3>
         <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
         </div>
        </div>
        <div class="box-body">
         <!-- Conversations are loaded here -->
         <div class="direct-chat-messages">
          <span><strong>Event Information</strong></span>

          <!-- Message. Default to the left -->
          <div class="direct-chat-msg">
           <img class="direct-chat-img" src="<?php echo HTTP_ROOT . COVER_PHOTO . $list->event->image; ?>" alt="<?php echo $list->event->name; ?>"><!-- /.direct-chat-img -->
          </div>
          <div class="direct-chat-info clearfix">
           <span class="direct-chat-name pull-left"> Up coming event Date</span>
           <span class="direct-chat-timestamp pull-right"> <?php echo $this->Custom->eventDateDisplay($list->date); ?></span>
          </div>
          <span><strong>Ticket information</strong></span>
          <?php foreach ($list->event->event_tickets as $tickts) { ?>


           <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left"><?php echo $tickts['ticket_type']; ?>( &euro; <?php echo$tickts['price'] ?> ) ( <?php echo$tickts['noof_tickets']; ?> )</span>
           </div>
          <?php } ?>

         </div>

         <!-- Contacts are loaded here -->
        </div><!-- /.box-body -->
        <div class="box-footer">

         <div class="input-group">
          <span class="input-group-btn">
           <a href="<?php echo HTTP_ROOT . 'appadmins/event_details/' . $this->Custom->makeSeoUrl($list->event->name) . '-' . $list->event->id ?>">
            <button type="button" class="btn btn-primary btn-flat">Go event details</button>
           </a>

          </span>
          <div class="direct-chat-info clearfix">
           <span class="direct-chat-name pull-right"> No. of Offline Ticket( <?php echo empty($totalOffLine[$list->event->id][0]['ticket_sum']) ? '0' : $totalOffLine[$list->event->id][0]['ticket_sum']; ?> ) </span>
           <span class="direct-chat-name pull-right"> No of Live Ticket( <?php echo empty($totallive[$list->event->id][0]['ticket_sum']) ? '0' : $totallive[$list->event->id][0]['ticket_sum'] ?> )</span>

          </div>
         </div>


        </div><!-- /.box-footer-->
       </div><!--/.direct-chat -->
      </div>
     <?php } ?>
  </div>

 </section>
</div>

