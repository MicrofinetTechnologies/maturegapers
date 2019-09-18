<style>
 .error{
  font-size: 14px !important;
  font-weight: 300;
  color:#ff464e;
 }
 .inquiryForm div{
  margin-bottom: 25px;
  width: 48.66%;
  float: left;
 }
 .inquiryForm div:nth-child(odd){
  float: right;
 }
 .inquiryForm div input{
  width: 100% !important;
  margin-bottom: 0 !important;
 }
</style>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>


<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'events' ?>">Events</a></li>
   <li class="active"><?php echo $eventDetail->name; ?></li>
  </ul>
 </div>
</section>
<section class="textureOne">
 <div class="wrapper">
  <div class="event_gallery">
   <img title="<?php echo $eventDetail->name; ?>"  src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image ?>" alt="<?php echo $eventDetail->name; ?>" />
  </div>
  <div class="event_description">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <li><?php echo $this->Custom->eventDateDisplay($eventDetail->event_schedule->date); ?></li>

   </ul>
   <h3>Personal Info</h3>
   <div class="inquiryForm" style="width: 100%; margin: 10px 0;">
    <?php echo $this->Form->create(@$user, ['url' => ['action' => 'personalInfo'], 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'personalInfofrm']); ?>
    <div><label for="firstName">First Name</label>
     <input type="text" name="firstName" required = 'required' id="firstName" placeholder="First Name" value="<?php echo @$bookingDetails->first_name; ?>" /></div>

    <div><label for="lastName">First Name</label>
     <input type="text" name="lastName"   id="lastName" placeholder="Last Name" value="<?php echo @$bookingDetails->last_name; ?>" /></div>

    <div><label for="phoneNo">First Name</label>
     <input type="text" name="phoneNo" id="phoneNo"  placeholder="Phone Number" value="<?php echo @$bookingDetails->phone; ?>" /></div>

    <div> <label for="emailAddress">First Name</label>
     <input type="text" name="emailAddress" id="emailAddress" value="<?php echo @$bookingDetails->email; ?>" placeholder="Email Address" />
     <p style="font-size: 10px;">Please put correctly email as ticket will be emailed</p>
    </div>

   </div>
   <h3>Tickets Selected</h3>
   <table width="100%" class="ticketDetails">
    <thead>

     <tr>
      <td>Ticket Category</td>
      <td>No. of Tickets</td>
      <td>Amt.</td>
     </tr>
    </thead>
    <?php

      $totalQty = 0;
      $totalPrice = 0;
      foreach ($ticketDetails as $tktDetails) {

       $totalQty+=$tktDetails->qty;
       $totalPrice+=$tktDetails->total;

       ?>
       <tr>
        <td><?php echo $tktDetails->event_ticket->ticket_type; ?> <span>(&euro;<?php echo number_format((float) $tktDetails->price, 2, '.', ''); ?>)</span></td>
        <td><?php echo $tktDetails->qty; ?></td>
        <td>&euro;<?php echo number_format((float) $tktDetails->total, 2, '.', ''); ?></td>
       </tr>
      <?php } ?>


    <tr>
     <td>TOTAL</td>
     <td><?php echo $totalQty; ?> <span>tickets</span></td>
     <td>&euro;<?php echo number_format((float) $totalPrice, 2, '.', ''); ?> <span>Amt. payble</span></td>
    </tr>
   </table>
   <button type="submit" class="payNow" name="paynow" value="paynow" style="margin-top: 0;">PROCEED</button>
   <?php echo $this->Form->end(); ?>
  </div>
  <div class="clear"></div>
 </div>
</section>
<script>
 $(function(){
  $("#personalInfofrm").validate({
   ignore:[],
   onkeyup:function(element){
    if(element.name=='email'){
     return false;
    }
   },
   rules:{
    firstName:"required",
    lastName:"required",
    phoneNo:"required",
    emailAddress:"required",
    emailAddress:{
     required:true,
     email:true
    },
   },
   messages:{
    firstName:"Please enter your first name",
    lastName:"Please enter your last name",
    phoneNo:"Enter your mobile number",
    emailAddress:{
     required:"Please enter your email address",
     email:"Please enter your valid email address",
    }
   }
  });
  $('#phoneNo').keypress(function(event){
   var keycode=event.which;//var x=event.keyCode;
   if(!(event.shiftKey==false&&(keycode==46||keycode==8||keycode==37||keycode==39||keycode==43||(keycode>=48&&keycode<=57)))){
    event.preventDefault();//stops the default action of an element from happening.
   }
  });

 });
</script>