<style>
 *{border: none;}
 .clear{clear: both;}
 #event_chose_date {padding: 0; list-style: none;}
 #event_chose_date li {padding: 5px 35px 5px 15px; margin: 0 5px 5px 0; width: 115px; float: left; background: #f1f1f1; border: 1px solid #e1e1e1; position: relative; color: #999;}
 #event_chose_date li span {padding: 10px; position: absolute; right: 0; top: 0; bottom: 0; line-height: 7px; cursor: pointer; color: red; background: #FFF;}
 .entry {float: left !important;}
 .day-event{margin: 0 5px 5px 0; padding: 5px 47px 5px 20px; width: auto !important; position: relative; background: #f1f1f1; border: 1px solid #e1e1e1;}
 .day-event .closeTime {position: absolute; right: 0; top: 0; bottom: 0; padding: 10px; background: #FFF; line-height: 7px;}
 .day-event p {margin: 0; font-size: 13px; color: #999;}
 .selected {
  background:#b62329!important;
  border-color: #b62329;
  color: #FFF;
 }
 .ticketType{
  margin-right: 2%!important;
  margin-left: 2%!important;
  text-align: center!important;
  width: 44% !important;

 }
 .quantity input, .total label, .total span{
  color:#000!important;
 }
 .day-event h3{font-size: 18px;}
 .ticketType span{
  text-align: center!important;
 }
 .personal_info .form-group{
  width: 49%;
  float: left;
 }
 .personal_info .form-group:nth-child(even){
  float: right;
 }
 .choose_ticket .form-group{
  width: 100%;
  float: left;
 }
 .choose_ticket .total_ticket_h3{margin-top: 0;}
 .choose_ticket .ticket_row{
  width: 100%;
  float: left;
  margin-top: 10px;}
 .day-event {
  padding: 5px 20px;
 }
 .day-event {
  background: #fff!important;
 }
 .day-event.selected {
  color: #FFF!important;
  background: #b62329!important;
 }
 .day-event.selected p {
  color: #FFF!important;
 }
 .disbale {
  background: #e1e1e1!important;
 }
</style>
<link href="<?php echo HTTP_ROOT . 'css/' ?>dcalendar.picker.css" rel="stylesheet" type="text/css">
<div class="content-wrapper">
 <section class="content-header">
  <!--  <h1>
     Tickets
    </h1>-->
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
 </section>

 <section class="content" style='min-height:50px;'>
  <div class="box-body">
   <div class="col-md-12">
    <label>Enter ticket sale date</label>
    <?php echo $this->Form->create(@$user, ['url' => ['action' => 'dateWise'], 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'searchFrm']); ?>
    <div class="col-md-3">
     <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
       </div>
       <?php echo $this->Form->input('from_dt', ['placeholder' => 'From Date', 'id' => 'from', 'type' => 'text', 'value' => @$fromDate, 'label' => false, 'class' => "form-control"]); ?>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
       </div>
       <?php echo $this->Form->input('to_dt', ['placeholder' => 'To Date', 'id' => 'to', 'type' => 'text', 'value' => @$toDate, 'label' => false, 'class' => "form-control"]); ?>
      </div>
     </div>
    </div>
    <div class="col-md-1" style='width: 4.333%;'>
     <div class="form-group"><button class="btn btn-success" id="add"  type="submit">Go</button></div>
    </div>
    <div class="col-md-1">
     <div class="form-group"><a href="<?php echo HTTP_ROOT . 'appadmins/date_wise' ?>"><button class="btn btn-default" id="add"  type="button">Reset</button></a></div>
    </div>
    <?php echo $this->Form->end(); ?>
   </div>
  </div>
 </section>
 <?php if (isset($ticketDetails)) { ?>
    <section class="content">
     <div class="row">
      <div class="col-xs-12">
       <div class="btn-group pull-right">
        <a href="<?php echo HTTP_ROOT . 'appadmins/date_wise_reports/' . @$dbfromDate . '/' . @$dbtoDate ?>"><button type="button" class="btn btn-danger btn-flat">Download Report</button></a>
       </div>
      </div>
      <div class="col-xs-12">

       <div class="box">
        <div class="box-header">
         <h3 class="box-title"> Ticket Listing</h3>
        </div>
        <div class="box-body" >
         Row background color hints
         <table style='width: 16%;' class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
          <tbody>
           <tr class="message_box odd" role="row">
            <!--<td class="pending sorting_1" style="text-align:  left;">Panding</td>-->
            <td class="paid" style="text-align:  left;">Paid</td>
           </tr>
          </tbody>
         </table>
         <table id="example1" class="table table-bordered table-striped">
          <thead>
           <tr>
            <th width="30">Ticket id</th>
            <th>Name</th>
            <th>Phone</th>
            <th width="30">Purchase Dt.</th>
            <th>Qty.</th>
            <th>Total</th>
            <th style="text-align: center;width:80px;">Mode</th>
           </tr>
          </thead>
          <tbody >

           <?php

           foreach ($ticketDetails as $list):
            if ($list->payment_status == 1) {
             $class = 'paid';
            } else if ($list->payment_status == 0) {
             $class = 'pending';
            }

            ?>
            <tr class="message_box">
             <td class='<?php echo $class; ?>' style="text-align:  left;"><?php echo $list->unique_id; ?></td>
             <td class='<?php echo $class; ?>' style="text-align:  left;"><?php echo $list->first_name . ' ' . $list->last_name ?></td>
             <td class='<?php echo $class; ?>' style="text-align:  left;"><?php echo $list->phone; ?></td>
             <td class='<?php echo $class; ?>' style="text-align:  left;"><?php echo date('d-m-Y', strtotime($list->created)); ?></td>

             <td class='<?php echo $class; ?>' style="text-align:  left;"><?php echo $list->ticket_no ?></td>
             <td class='<?php echo $class; ?>' style="text-align:  left;">&euro; <?php echo number_format((float) $list->total_amount, 2, '.', ''); ?></td>
             <td style="text-align: center;">
              <?php echo ($list->payment_mode == 2) ? '<span class="btn btn-warning btn-flat"> Offline </span>' : '<span class="btn btn-success btn-flat">Online</span>'; ?>

             </td>
            </tr>
           <?php endforeach; ?>
          </tbody>
         </table>
         Row background color hints
         <table style='width: 16%;' class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
          <tbody>
           <tr class="message_box odd" role="row">
            <!--<td class="pending sorting_1" style="text-align:  left;">Panding</td>-->
            <td class="paid" style="text-align:  left;">Paid</td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>
    </section>
   <?php } ?>
</div>
<script src="<?php echo HTTP_ROOT . 'js/' ?>dcalendar.picker.js"></script>
<script>
 $('#from').dcalendarpicker();
 $('#to').dcalendarpicker();

</script>




