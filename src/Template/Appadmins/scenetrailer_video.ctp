<div class="content-wrapper">
    <section class="content-header">
        <h1>Trailer Video </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins/scenes_list"><i class="fa fa-list"></i> Scenes Listl</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">

                        <li id='li_schedule' class="active" ><a href="<?php echo HTTP_ROOT . 'appadmins/create_video/' . $id ?>" >Scene Video </a></li>


                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">

                        <div class="" style="margin: 0 auto; margin-top: 20px;" id="form_wrapper">
                            <img src="<?= $this->Url->image('loading.gif'); ?>" id="gif" style="display: block; margin: 0 auto; width: 100px; visibility: hidden;">


                            <div class="tab-pane active">

                                <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>

                                    <input   required="required" id="id" name="id" type="hidden" value='<?php echo @$video_id; ?>'>

                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Choose Scene <span style="color:#FF0000">*</span></label>
                                        <div class="col-sm-6">
                                            <?= $this->Form->select('scene_id', $options, ['class' => "form-control", 'label' => false, 'onchange' => 'setUrl(this.value)', 'default' => @$id, 'id' => 'scene_id']); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Available Videos</label>
                                        <div class="col-sm-6">   
                                            <select class="form-control" name="video_quality" required>
                                                <option value="" disabled selected> Select a video </option>
                                                <?php foreach ($dataListings as $list) { ?>

                                                    <option value="<?= $list->id; ?>" <?php
                                                    if ($list->id == $video_id) {
                                                        echo "selected";
                                                    }
                                                    ?> onclick = "setUrl2(<?= $id; ?>,<?= $list->id; ?>)"><?= $list->video_name; ?></option>
                                                        <?php } ?>
                                            </select>
                                             <div class="help-block with-errors"></div>
                                        </div>

                                    </div>

                                    <!--                                <div class="form-group">
                                                                        <label for="inputEmail" class="col-sm-2 control-label">Video Name <span style="color:#FF0000">*</span></label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" name="video_name" required="required" data-error = 'Enter video_name' id="video_name" value="<?php echo @$editData->video_name; ?>">
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </div>-->
                                    <!--                                <div class="form-group">
                                                                        <label for="inputEmail" class="col-sm-2 control-label">Video length <span style="color:#FF0000">*</span></label>
                                                                        <div class="col-sm-6">
                                                                            <input type="text" class="form-control" name="video_durations" required="required" data-error = 'Enter video_length' id="video_length" value="<?php echo @$editData->video_durations; ?>">
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </div>                                -->
<?php if (file_exists("/home/maturegapers/public_html/webroot/files/videos/" . @$editData->scene_id . '/' . @$editData->video_file)) { ?>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">  Video quality</label>
                                        <div class="col-sm-6">   
                                            <select class="form-control" name="video_quality">
                                                
                                                <option value="360p" <?php echo (in_array("360p", explode(",", @$editData->video_quality))) ? "disabled" : ""; ?>>360p </option>
                                                <option value="720p" <?php echo (in_array("720p", explode(",", @$editData->video_quality))) ? "disabled" : ""; ?>>720p </option>
                                                <option value="1080p" <?php echo (in_array("1080p", explode(",", @$editData->video_quality))) ? "disabled" : ""; ?>>1080p </option>
                                                <option value="4K" <?php echo (in_array("4K", explode(",", @$editData->video_quality))) ? "disabled" : ""; ?>>2160p(4K) </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">  Video Tags</label>
                                        <div class="col-sm-6">                                      
                                            <textarea name="tags" id='tags' class="form-control" data-error = 'Enter video tags' placeholder="Ex:- Old and Young, Reality, Shaved, Bit, Tits"><?php echo @$editData->tags; ?></textarea>                                        
                                        </div>

                                    </div>


                                    <!--                                <div class="form-group">
                                                                        <label for="inputName" class="col-sm-2 control-label"></label>
                                                                        <div class="col-sm-8">
                                                                            <span style="padding-top: 3px; display: block; color: red"> "Video should be used mp4" </span>
                                                                        </div>
                                                                    </div>-->

                                    <!--                                <div class="form-group">
                                                                        <div class="col-sm-offset-2 col-sm-6">
                                                                        <div class="progress">
                                                                            <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">
                                                                                0%
                                                                            </div>
                                                                        </div>
                                                                        <div class="msg"></div>
                                                                        </div>
                                                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button onClick="$('#gif').css('visibility', 'visible');$('#form1').submit();" type="button" name='__submit__' id='event_save' value="2" class="btn btn-danger">Save</button>  

                                        </div>
                                    </div>
                                    <?php }else{ 
                                        echo "<p style='color:red;'>You can't convet this file beause Source file already Deleted</p>"; 
                                    } ?>
                                </form>
                            </div>

                        </div>

                    </div>

                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </section>


    <!--   
       <script type="text/javascript">    
   //configuration
   var max_file_size 			= 10485760000000; //allowed file size. (1 MB = 1048576)
   var allowed_file_types 		= ['video/mp4', 'video/mpeg']; //allowed file types
   var result_output 			= '.msg'; //ID of an element for response output
   var my_form_id 				= '#form1'; //ID of an element for response output
   var progress_bar_id 		= '.progress'; //ID of an element for response output
   var total_files_allowed 	= 10000; //Number files allowed to upload
   
   
   
   //on form submit
   $(my_form_id).on( "submit", function(event) { 
           event.preventDefault();
           var proceed = true; //set proceed flag
           var error = [];	//errors
           var total_files_size = 0;
           $('.progress').show();
           var scene_id = $("#scene_id option:selected" ).val();
           var tags = $("#tags").val();
           
           var video_quality1 = [];
               $.each($("input[name='video_quality[]']:checked"), function(){         
                   video_quality1.push($(this).val());
               });
           var video_quality = video_quality1.join(",");  
           //reset progressbar
           $(progress_bar_id +" .progress-bar").css("width", "0%");
           $(progress_bar_id + " .myprogress").text("0%");
                                                           
           if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
                   error.push("Your browser does not support new File API! Please upgrade."); //push error text
           }else{
                   var total_selected_files = this.elements['video_filess'].files.length; //number of files
                   
                   //limit number of files allowed
                   if(total_selected_files > total_files_allowed){
                           error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
                           proceed = false; //set proceed flag to false
                   }
                    //iterate files in file input field
                   $(this.elements['video_filess'].files).each(function(i, ifile){
                           if(ifile.value !== ""){ //continue only if file(s) are selected
                                   if(allowed_file_types.indexOf(ifile.type) === -1){ //check unsupported file
                                           error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); //push error text
                                           proceed = false; //set proceed flag to false
                                   }
   
                                   total_files_size = total_files_size + ifile.size; //add file size to total size
                           }
                   });
                   
                   //if total file size is greater than max file size
                   if(total_files_size > max_file_size){ 
                           error.push( "You have "+total_selected_files+" file(s) with total size "+total_files_size+", Allowed size is " + max_file_size +", Try smaller file!"); //push error text
                           proceed = false; //set proceed flag to false
                   }
                   
                   var submit_btn  = $(this).find("input[type=submit]"); //form submit button	
                   
                   //if everything looks good, proceed with jQuery Ajax
                   if(proceed){
                           //submit_btn.val("Please Wait...").prop( "disabled", true); //disable submit button
                           var form_data = new FormData(this); //Creates new FormData object
                           form_data.append('scene_id', scene_id);
                           form_data.append('video_quality', video_quality);
                           form_data.append('tags', tags);
                           var post_url = $(this).attr("action"); //get action URL of form
                           
                           //jQuery Ajax to Post form data
   $.ajax({
           url : post_url,
           type: "POST",
           data : form_data,
           contentType: false,
           cache: false,
           processData:false,
           error: function(jqXHR, textStatus, errorThrown){
                   $(".msg").text("Video upload failed. Please Try again.");
               },
           xhr: function(){
                   //upload Progress
                   var xhr = $.ajaxSettings.xhr();
                   if (xhr.upload) {
                           xhr.upload.addEventListener('progress', function(event) {
                                   var percent = 0;
                                   var position = event.loaded || event.position;
                                   var total = event.total;
                                   if (event.lengthComputable) {
                                           percent = Math.ceil(position / total * 100);
                                   }
                                   //update progressbar
                                   $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
                                   $(progress_bar_id + " .myprogress").text(percent +"%");
                           }, true);
                   }
                   return xhr;
           },
           mimeType:"multipart/form-data"
   }).done(function(res){ //
           $(my_form_id)[0].reset(); //reset form
           //$(result_output).html(res); //output response from server
           $(".msg").text("complete");
           submit_btn.val("Upload").prop( "disabled", false); //enable submit button once ajax is done
   });
                           
                   }
           }
           
           $(result_output).html(""); //reset output 
           $(error).each(function(i){ //output any error to output element
                   $(result_output).append('<div class="error">'+error[i]+"</div>");
           });
                   
   });
   </script>
       
    -->







    <section class="content">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Video Listing</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Video Durations</th>
                                    <th>Type</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php foreach ($dataListings as $list): ?>
                                    <tr>

                                        <td style="text-align:  left;"> <?php echo $list->video_name; ?></td>
                                        <td style="text-align:  left;"><?php echo $list->video_durations; ?> </td>
                                        <td style="text-align:  left;"><?php echo $list->is_tailer; ?> </td>

                                        <td style="text-align: center; width: 20%">
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'scenetrailer_video', $id, $list->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php // echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-youtube-play')), ['action' => '#', '', ''], ['escape' => false, "data-placement" => "top", "data-hint" => "Add video", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>

                                            <?php if ($list->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/ScenesVideos'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/ScenesVideos'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>

                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'ScenesVideos'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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

<script>
    function setUrl(id) {

        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/scenetrailer_video/' ?>' + id;
    }
</script>
<script>
    function setUrl2(id, vid) {
        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/scenetrailer_video/' ?>' + id + '/' + vid;
    }
</script>
