<style>
    .form-group {
        margin-bottom: 0px !important;
    }
    .btn-success{
       background-color: #1e8a2a !important;
        border-color: #128006 !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1> General Setting  </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/generalSetting"> <i class="fa fa-list"></i>General Setting</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <form method="post" data-toggle="validator" novalidate="true" enctype="multipart/form-data">
                        <div class="form-group col-md-10" style="margin-top: 20px;">                
                            <label for="exampleInputName">Site Name <span style="color: red;">*</span></label>                    
                            <input name="sitename" placeholder="Site name" class="form-control" required="required" data-error="Enter Site name" id="sitename" type="text" value="<?php echo $dataListings->sitename; ?>">                    
                            <div class="help-block with-errors"></div>                
                        </div>
                        <input name="id" type="hidden" value="<?php echo $dataListings->id; ?>">
                        <div class="form-group col-md-10" >                
                            <label for="exampleInputName">Site Sort Name <span style="color: red;">*</span></label>

                            <input name="sortname" placeholder="Site Sort name" class="form-control" required="required" data-error='Enter Site sort name' id="sitesortname" type="text" value="<?php echo $dataListings->sortname; ?>">                    
                            <div class="help-block with-errors"></div>                      
                        </div>
                        <div class="form-group col-md-10" > 

                            <label for="exampleInputName">Logo <span style="color: red;">*</span></label>
                            <img src="<?php echo HTTP_ROOT . SOCIAL_ICON . $dataListings->logo; ?>" width='250'/>
                            <input name="logo"   id="sitelogo" type="file" data-toggle="tooltip" title="Image height=129px width=257px">                    
                            <div class="help-block with-errors"></div>                      
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail">Photo Download Mode<br/>
                                <input type='checkbox' name='download' value='1' <?php if ($dataListings->download == 1) { ?>checked="checked"<?php } ?> />
                            </div>
                        </div>

                        <div class="form-group col-md-6" > 

                          

                            <div class="form-group">
                                <label for="exampleInputEmail"> Video Download Mode</label><br/>
                                <input type='checkbox' name='download_video' value='1' <?php if ($dataListings->download_video == 1) { ?>checked="checked"<?php } ?> />
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">

                                <button type="submit" id="save" class="btn btn-danger" >Update</button>

                            </div>
                        </div>
                        

                    </form>     
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo HTTP_ROOT ?>js/bootstrap-switch.js" ></script>
<script>
 $("[name='download']").bootstrapSwitch({
  on:'ON',
  off:'OFF',
  onClass:'success',
  offClass:'danger'
 });
</script>
<script>
 $("[name='download_video']").bootstrapSwitch({
  on:'ON',
  off:'OFF',
  onClass:'success',
  offClass:'danger'
 });
</script>