<script src="<?php echo HTTP_ROOT . 'js/' ?>jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>
<script type="text/javascript">
//    var jq = $.noConflict();
 $(function(){
  var strURL='<?php echo HTTP_ROOT; ?>';
  $("#list").sortable({class:'move',update:function(){
    var order=$('#list').sortable('serialize');
    // alert(order);
    $.post(strURL+"appadmins/modelgallOrder",order,function(theResponse){
    });
   }
  });
 });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Model Photo Gallery</h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li id='li_photo' class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/create_photo/' . $model_id ?>">Model photo</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="photo"> 
                            <form class="form-horizontal" id="form1" method="POST" action="" data-toggle="validator" novalidate="true" enctype='multipart/form-data'>

                                <input   required="required" id="scenes_id" name="scene_id" type="hidden" value='<?php echo @$id; ?>'>
                                <input   required="required" id="id" name="id" type="hidden" value='<?php echo @$photo_id; ?>'>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Chose Model <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <?= $this->Form->select('model_id', $options, ['class' => "form-control", 'label' => false, 'onchange' => 'setUrl(this.value)', 'default' => @$model_id,'id'=>'modelid']); ?>
                                        <div class="help-block with-errors"></div>
                                       
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Chose Gallery <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-6">
                                        <?= $this->Form->select('gal_name', $options_gallery, ['class' => "form-control", 'label' => false,'required'=>'required',  'default' => @$model_id,'id'=>'gal_id']); ?>
                                        <div class="help-block with-errors"></div>
                                        
                                    </div> <?php  if($options_gallery_count < 4){ ?> Or &nbsp; <span class="btn btn-info" data-toggle="modal" data-target="#myModal">Create Gallery</span> <?php } ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"> Photo <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-8">
                                        <?php //echo $this->Form->input('photo_filess.', array('id'=>'photo_filess','type' => 'file', 'multiple'));?>
                                            <input name="photo_filess[]" type="file" multiple />
<!--                                        <input type="file" name='photo_filess' id='photo_filess' multiple>-->
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">
                                            0%
                                        </div>
                                    </div>
                                    <div class="msg"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button  type="submit" name='__submit__' value="4" id='btn' class="btn btn-danger">Save</button>  

                                    </div>
                                </div>
                                <!-- Trigger the modal with a button -->
<script type="text/javascript">    
//configuration
var max_file_size 			= 10485760000000; //allowed file size. (1 MB = 1048576)
var allowed_file_types 		= ['image/jpeg', 'image/pjpeg']; //allowed file types
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
        var model_id = $("#modelid option:selected" ).val();
        var gal_name = $("#gal_id option:selected" ).text();
	//reset progressbar
	$(progress_bar_id +" .progress-bar").css("width", "0%");
	$(progress_bar_id + " .myprogress").text("0%");
							
	if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
		error.push("Your browser does not support new File API! Please upgrade."); //push error text
	}else{
		var total_selected_files = this.elements['photo_filess[]'].files.length; //number of files
		
		//limit number of files allowed
		if(total_selected_files > total_files_allowed){
			error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
			proceed = false; //set proceed flag to false
		}
		 //iterate files in file input field
		$(this.elements['photo_filess[]'].files).each(function(i, ifile){
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
                        form_data.append('model_id', model_id);
                        form_data.append('gal_name', gal_name);
			var post_url = $(this).attr("action"); //get action URL of form
			
			//jQuery Ajax to Post form data
$.ajax({
	url : post_url,
	type: "POST",
	data : form_data,
	contentType: false,
	cache: false,
	processData:false,
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
<!--                                <script>
            $(function () {
                $('.progress').hide();
                $('#btn').click(function () {
                    $('.progress').show();
                    var model_id = $("#modelid option:selected" ).val();
                    var gal_name = $("#gal_id option:selected" ).text();
                    var myfile = document.getElementById("photo_filess");
                    var tot_pic_c = myfile.files.length;
                    
                    for (var i = 0; i < myfile.files.length; i++) {
                        uploadSingleFile(myfile.files[i], i,model_id,gal_name,tot_pic_c);
                        $('.msg').text('');
                        $('.myprogress').css('width', '0%');
                    }
                    
                    // var filename = $('#filename').val();
//                    if (filename == '' || myfile == '') {
//                        alert('Please enter file name and select file');
//                        return;
//                    }
                    
                });
            });
            
            function uploadSingleFile(myfile, i,model_id,gal_name,tot_pic_c){
                
                var formData = new FormData();
                    formData.append('myfile', myfile);
                    formData.append('model_id', model_id);
                    formData.append('gal_name', gal_name);
                    $('.msg').text('');
                    $('.myprogress').css('width', '0%');
                    $('#btn').attr('disabled', 'disabled');
                     $('.msg').text('Uploading in progress...');
                     //alert('f');
                     
                    $.ajax({
                        url: '<?=HTTP_ROOT;?>appadmins/modelGalleryPic',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',

                        success: function (data) {
                            if(data){
                                //getProgressBar(i,tot_pic_c);
                                $('.myprogress').css('width', 100 + '%');
                               // $('.myprogress').text(100+ '%');
                                //$('.msg').text(data);
                                $('#btn').removeAttr('disabled');
                            }
                        }
                    });
            }
//            function getProgressBar(i,tot_pic_c){
//                //console.log("sd");
//                $('.myprogress').text(((i/(tot_pic_c-1))*100 )+ '%');
//                $('.myprogress').css('width', Math.round((i/(tot_pic_c-1))*100 )+ '%');
//                //alert((i/(tot_pic_c-1))*100 );
//                return true;
//            }
        </script>-->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Gallery</h4>
        </div>
        <div class="modal-body">
            <div claa="container">
   
                <input class="form-control"   id="mod_id" name="mod_id" type="hidden"  autocomplete="off">
                                      
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-3 control-label">Gallery Name<span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control "  id="galleryname" name="galleryname" type="text"  autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputName" class="col-sm-3 control-label">Release Date <span style="color:#FF0000">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control release_date"   id="release_date" name="release_date" type="text"  autocomplete="off">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                
                                 <div class="form-group">
                                    <label for="inputName" class="col-sm-3 control-label"> </label>
                                    <div class="col-sm-4">
                                        <input class="btn btn-info"  id="btn_sub" value="Create Gallery" type="button"  onclick="creategal()">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                
            </div>
        </div>
      </div>
      
    </div>
  </div>
                            </form>
                        </div> 
                    </div>

                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Photo Gallery Listing</h3>
                    <div style="font-weight:400;"><small class="text-danger" >N.B:- According to order position of Gallery will appear in Model Photo Gallery.</small></div>

                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>Order Position</th>
                                <th>Gallery Name</th>
                                <th>Release Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php foreach ($photo_gallery as $list): ?>
                                <tr id="arrayorder_<?php echo $list->id; ?>" class="message_box ui-sortable-handle">
                                    
                                    <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /><span style="display:none;"></span>
                                    </td>
                                    <td><?=$list->name;?></td>
                                    <td><?=date('d-M-Y',strtotime($list->releasedate));?></td>
                                   
                                    <td>
                                        <a href="<?php echo HTTP_ROOT . 'appadmins/managemodel_photos/'.$model_id.'/' . $list->name ; ?>"><?= $this->Form->button('<i class="fa fa-picture-o"></i>', ["data-placement" => "top", "data-hint" => "Manage Photos", 'class' => "btn btn-info hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        
                                        <?php if ($list->is_active == 1) { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/PhotoGallery'; ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                        <?php } else { ?>
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/PhotoGallery'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                        <?php } ?>
                                       
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'PhotoGallery'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
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
       
        window.location.href = '<?php echo HTTP_ROOT . 'appadmins/create_photo/' ?>' + id;
    }
</script>
<style>
    .datepicker {    
    z-index: 11111;}
</style>
<script>
$(document).ready(function() {
    $('#mod_id').val($( "#modelid option:selected" ).val());
    $('#release_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    });
    
});
</script>
<script>
                    function creategal(){
                        var model_id=$('#mod_id').val();
                        var name=$('#galleryname').val();
                        var release_date=$('#release_date').val();
                        
                        jQuery.ajax({
                            type: "POST",
                            url: "<?= HTTP_ROOT; ?>" + "appadmins/createGallary",
                            dataType: 'json',
                            data: {model_id: model_id,name:name,release_date:release_date},
                            success: function (res) {
                                      alert(res.msg);
                                      if(res.status == "success"){
                                      location.reload(true);}
                                }
                        });
                    }
</script>

<script>
                    $(document).ready(function() {
                        $('#example1').DataTable( {
                           "order": [[ 0, 'asc' ]],
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                        } );
                    } );
</script>