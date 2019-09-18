<section class="textureOne">
 <div class="wrapper">
  <h2 style="text-align: center;">FEATURED Events</h2>
  <?php foreach ($featureEvents as $featureEvent) { ?>

     <div class="featured_events">
      <a href="<?php echo ($featureEvent->link) ? $featureEvent->link : 'javascript:void(0)' ?>"><img  title="Title of <?php echo $featureEvent->title ?>" src="<?php echo HTTP_ROOT . FEATURE_IMAGES . $featureEvent->image ?>" alt="image of <?php echo $featureEvent->title ?>" /></a>
      <!--      <div class="event_details">
             <h3><?php echo $featureEvent->title ?><span><?php echo $featureEvent->event_by ?></span></h3>
             <p><?php echo $this->Custom->eventDateDisplay($featureEvent->date_time) ?></p>
             <a href="<?php echo ($featureEvent->link) ? $featureEvent->link : 'javascript:void(0)' ?>">LEARN MORE</a>
            </div>-->
     </div>
    <?php } ?>


  <div class="socialfeeds_row">
   <div class="testimonials">
    <h3>Customer Says</h3>
    <div class="owl-carousel" id="testimonials">
     <?php

       $liCount = 0;
       foreach ($customerListings as $customerListing) {
        $li = $liCount % 3;
        if ($li == 0) {

         ?>
         <div>
          <ul>
          <?php } ?>
          <li>
   <!--           <div><img  title="Customer says <?php echo $customerListing->name ?>" src="<?php echo HTTP_ROOT . CUSTOMER . $customerListing->image; ?>" alt="Image <?php echo $customerListing->name ?>" /></div>-->
           <p><?php echo $customerListing->descriptions ?><br /><span><?php echo $customerListing->name ?></span></p>
          </li>
          <?php

          if ($li == 2) {

           ?>
          </ul>
         </div>
         <?php

        }
        $liCount++;
       }
       if ($liCount % 3 != 0) {

        ?>
        </ul>
       </div>
      <?php } ?>



   </div>
   <script>
    $(document).ready(function(){
     var owl=$('#testimonials');
     owl.owlCarousel({
      items:1,
      loop:true,
      margin:20,
      autoplay:true,
      mouseDrag:false,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      smartSpeed:1000,
      dots:true,
      nav:false,
      animateOut:'slideOutUp',
      animateIn:'slideInUp'
     });
    });
   </script>
  </div>
  <div class="social_feeds">
  <a class="twitter-timeline" data-lang="en" data-width="278" data-height="407" data-dnt="true" href="https://twitter.com/encorenapa?ref_src=twsrc%5Etfw">Encorenapa.com</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>
    <div class="social_feeds">
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=282258398857911&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
   
   <div class="fb-page" data-href="https://www.facebook.com/encorenapa/" data-tabs="timeline" data-width="278" data-height="407" data-small-header="true" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/encorenapa/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/encorenapa/">Encore Ayia Napa</a></blockquote></div>
  </div>
 </div>
</div>
</section>