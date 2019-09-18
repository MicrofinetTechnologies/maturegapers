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