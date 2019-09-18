<div class="content-wrapper">
    <section class="content-header">
        <h1> Home page 1st scene Setting</h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active" ><a href="javascript:void(0);"><i class="fa fa-list"></i> Home page 1st scene Setting </a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!--                    <div class="box-header">
                                            <h3 class="box-title">Home page 1st scene Setting</h3>                        
                                        </div>-->
                    <div class="box-body">
                        <?= $this->Form->create(null, ['type' => 'post', 'id' => 'scene_setting']); ?>
                        <div class="form-group">
                            <label for="exampleSelect1">Scene view type</label>
                            <select class="form-control" id="exampleSelect1" name="type" onchange="chg()"> 
                                <option value="Last created">Last added scene</option>
                                <option value="Random">Random scene</option>
                                <option value="Select manually">Select manually</option>
                            </select>
                        </div>
                        <div class="form-group" id="sce">
                            <label>Scene</label>
                            
                            <?= $this->Form->select('scene_id', $allscene, ['class' => "form-control", 'label' => false, 'default' => @$editdata->scene_id,'id'=>'scene_id']); ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#sce').hide();
        $('#exampleSelect1').val('<?=@$editdata->type;?>');
        if ($('#exampleSelect1 option:selected').val() == "Select manually") {
            chg();
        }
    });
    function chg() {
        if ($('#exampleSelect1 option:selected').val() == "Select manually") {
            $('#sce').show();
        } else {
            $('#sce').hide();
        }
    }
</script>