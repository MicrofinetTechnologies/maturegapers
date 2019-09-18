<?php  //pj($model_details);
if($model_details != "" || $model_details != null){
?>
<div class="">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Model information</h3>
                </div>
            <div class="panel-body">
              <div class="row">
                  <div class=" col-md-9 col-lg-9 " style="width:100%;"> 
                  <table class="table table-user-information">
                    <tbody>                                                                  
                      <tr>
                        <td width="30%">Stage Name</td>
                        <td width="70%"><?=$model_details->model_name;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Model Real Name</td>
                        <td width="70%"><?=$model_details->model_real_name;?></td>
                      </tr>
                      <tr>
                        <td width="30%">Gender</td>
                        <td width="70%"><?=$model_details->gender;?></td>
                      </tr> 
                      <tr>
                        <td width="30%">Model Age</td>
                        <td width="70%"><?=$model_details->age;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Date of birth</td>
                        <td width="70%"><?=$model_details->birth_date;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Hair</td>
                        <td width="70%"><?=$model_details->hair;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Eyes</td>
                        <td width="70%"><?=$model_details->eyes;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Height</td>
                        <td width="70%"><?=$model_details->height;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Weight</td>
                        <td width="70%"><?=$model_details->weight;?></td>
                      </tr>                                     
                      <tr>
                        <td width="30%">Tits Size</td>
                        <td width="70%"><?=$model_details->tits;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Dick size</td>
                        <td width="70%"><?=$model_details->dick_size;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">Release Date</td>
                        <td width="70%"><?=$model_details->release_date;?></td>
                      </tr>                     
                      <tr>
                        <td width="30%">About</td>
                        <td width="70%"><?=$model_details->model_about;?></td>
                      </tr>                    
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>               
            </div>
        </div>
        
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Number of videos
                    <span class="badge badge-primary badge-pill" style="background-color: green;"><?= $model_video_count;?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Number of photos
                    <span class="badge badge-primary badge-pill" style="background-color: green;"><?= $model_photo_count;?></span>
                </li>                
            </ul>
            
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#videomodal">
                    Choose a tailer video
                    <span class="badge badge-info" style="background-color: #17a1a1;"> Click here</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#photomodal">
                    Choose photos
                    <span class="badge badge-info" style="background-color: #17a1a1;"> Click here</span>
                </li>                
            </ul>
        </div>
        
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="videomodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose a tailer video</h4><small style="color:green;">1 video allowed</small>
        </div>
        <div class="modal-body">
            <?php foreach($model_video as $val_v){  ?>
            <label class="btn" style="background-color: #000;width: 48%;" >
            <span class="vio_block">                
                <input type="radio" class="rad form-check-input" name="model_video" id="<?=$val_v->id;?>" value="<?=$val_v->id;?>" data-toggle="tooltip" title="Click to set this video default for this scene." <?php if(!empty($set_model->model_video) && $val_v->id == @$set_model->model_video){ echo "checked";}?> />
            <video width="250" controls style="margin-right: 10px;">
                <source src="<?=HTTP_ROOT.VIDEOS.$model_id.'/'.$val_v->video_file;?>" type="video/mp4">
            </video>                
            </span>
          </label>
            <?php } ?>
        </div>          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- Modal -->
  <div class="modal fade" id="photomodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose photos</h4><small style="color:green;">4 photos allowed</small>
        </div>
        <div class="modal-body">
            
          <?php foreach($model_photo as $val_p){  ?>
            <label class="btn"  style="width:48%;">
            <span class="img_block">
                <img width="250" height="250" src="<?=HTTP_ROOT.PHOTOS.$model_id.'/'.$val_p->files_name;?>" style="margin-right: 10px;">
                <input type="checkbox" class="checkbox" id="<?=$val_p->id;?>" value="<?=$val_p->id;?>" name="model_image[]" data-toggle="tooltip" title="Photo will set in this scene." <?php if(!empty($set_model->model_image) && in_array($val_p->id , explode(',',$set_model->model_image))){ echo "checked";}?> />
            </span>
            </label>
            <?php } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>
        <style>
              .vio_block {position:relative; width:100%; margin-right:20px; margin-bottom:10px; height:30px;display: inline-grid;}
              .rad {position:absolute; right:5px; bottom:3px;} 
              .img_block { position:relative; width:100%; margin-right:20px; margin-bottom:10px; height:30px;display: inline-grid; }
              .checkbox { position:absolute; right:5px; bottom:3px; }
        </style>
        <script>
            $(document).ready(function () {
                
	   $("input[type='checkbox'][name='model_image[]']").change(function () {
	      var maxAllowed = 4;
	      var cnt = $("input[type='checkbox'][name='model_image[]']:checked").length;              
	      if (cnt > maxAllowed){
	         $(this).prop("checked", "");
	         alert('Select maximum ' + maxAllowed + ' photos!');
	     }
	  });
	});            
        </script>
