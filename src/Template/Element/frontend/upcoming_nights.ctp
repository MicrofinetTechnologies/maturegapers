<section class="textureTwo upcoming_nights">
 <div class="wrapper">
  <h2>Upcoming NIGHTS</h2>
  <div class="owl-carousel" id="upcomingNights">
   <?php

     foreach ($eventLists as $eventList) {

      ?>
      <div>
       <a href="<?php echo HTTP_ROOT . 'event-details/' . trim(preg_replace("![^a-z0-9]+!i", "-", trim($eventList->name)), "-") . '-' . $eventList->id; ?>">
        <?php if ($eventList->image) { ?>
         <img src="<?php echo HTTP_ROOT . COVER_PHOTO . 'medium_' . $eventList->image ?>" title="Title of <?php echo $eventList->name; ?> " alt="Image of<?php echo $eventList->name; ?>" />
        <?php } else { ?>
         <img src="http://via.placeholder.com/291x200" alt="<?php echo $eventList->name; ?>" />
        <?php } ?>
        <span class="event_name"> <?php

         if (strlen($eventList->name) <= 25) {
          echo $eventList->name;
         } else {
          $y = substr($eventList->name, 0, 25) . '...';
          echo $y;
         }

         ?> </span>
        <span class="learnMore"><?php if ($eventList->is_free_entry == 1) { ?>Free entry <?php } else { ?> Book now<?php } ?></span>
       </a>
      </div>
     <?php } ?>
  </div>
  <script>
   $(document).ready(function(){
    var owl=$('#upcomingNights');
    owl.owlCarousel({
     rtl:false,
     loop:true,
     margin:20,
     autoplay:true,
     autoplayTimeout:1000,
     autoplayHoverPause:true,
     smartSpeed:1000,
     dots:false,
     nav:true,
     responsiveClass:true,
     responsive:{
      0:{
       items:1,
       margin:5
      },
      480:{
       items:2
      },
      980:{
       items:3
      },
      1024:{
       items:4
      }
     }
    });
   });
  </script>
 </div>
</section>