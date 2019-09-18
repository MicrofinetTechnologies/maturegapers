<style>
 #searchEvent{
  position: relative;
 }
 .calendar1{position: absolute;width: 30%;right: 21%;top:5px; display: none;}
 @media only screen and (max-device-width : 840px) {
  #searchEvent,.calendar1{
   position: static;
  }
  .calendar1{width: 100%;margin-top: 0!important}
  .calendarHead1{ background: #9f0c12!important;}
 }

</style>

<section class="search_event">
 <link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT . 'css/frontend' ?>/search-calender-style.css"/>
 <script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT . 'admin-assets/js' ?>/search-simplecalendar.js"></script>
 <div class="wrapper" id="searchEvent">
  <?php echo $this->Form->create('User', ['url' => ['controller' => 'Users', 'action' => 'events'], 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'searchFrm']); ?>
  <label>Search our events:</label>
  <div style='display:none ;' id="multi_date_html"></div>
  <input type="text" name="search_title" id="search_title" placeholder="Search by Event" value="<?php echo @$title; ?>" />
  <input type="text" id="searchByDate" placeholder="Search by Date" value="<?php echo rtrim(@$datafilter, ','); ?>" />
  <input type="hidden" id="currentDate" value="<?php echo date('Y-m-d'); ?>" />
  <input type="hidden" value="" id="multi_date" name="date"/>
  <div class="calendar1">
   <div class="calendarHead1">
    <h2 class="month1"></h2>
    <a class="btn-prev1 fontawesome-angle-left1" href="javascript:void(0)"></a>
    <a class="btn-next1 fontawesome-angle-right1" href="javascript:void(0)"></a>
   </div>
   <table>
    <thead class="event-days1">
     <tr></tr>
    </thead>
    <tbody class="event-calendar1">
     <tr class="1"></tr>
     <tr class="2"></tr>
     <tr class="3"></tr>
     <tr class="4"></tr>
     <tr class="5"></tr>
    </tbody>
   </table>
   <div class="list1" style="text-align: left;">

   </div>
   <!--<div id ="reset">Reset Calendar</div>-->
  </div>
  <!--###############-->

  <button type="submit">SEARCH</button>
  <?php echo $this->Form->end(); ?>
 </div>
</section>
<script>
 $(document).ready(function(){
  $("#searchByDate").click(function(){
   $(".calendar1").toggle();
  });


//  $("body").click(function(){
//   $(".calendar1").hide();
//  });

 });
</script>
<script>
 $(document).ready(function(){
  // responsive-menu
  $('body').click(function(e){
   var container=$("#searchByDate,.calendar1");
   if(!container.is(e.target)&&container.has(e.target).length===0){
    $(".calendar1").hide();
   }
  });
 });
</script>