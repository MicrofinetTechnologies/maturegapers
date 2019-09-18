<div class="content-wrapper">
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= (HTTP_ROOT) ?>appadmins/view_banner">   <i class="fa  fa-user-plus"></i> View/Manage Banner</a></li>
        </ol>
        <?php //echo (HTTP_ROOT); ?>
    </section>

    <section class="content">
        <h1> Banner Setting </h1>
        
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                   <?= $this->Form->create(null, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                        <div class="well">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Auto Height</label>
                                <p class="help-block"><small>Auto adjusting height.</small></p>
                                <select class="form-control" name="autowidth">
                                    <option value="YES" <?php if($data->autowidth == "YES"){echo "selected";}?>>YES</option>
                                    <option value="NO" <?php if($data->autowidth == "NO"){echo "selected";}?>>NO</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Slide Move</label>
                                <p class="help-block"><small>Slide Effect.</small></p>
                                <select class="form-control" name="slidemove">
                                    <option value="YES" <?php if($data->slidemove == "YES"){echo "selected";}?>>YES</option>
                                    <option value="NO" <?php if($data->slidemove == "NO"){echo "selected";}?>>NO</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Slide Margin</label>
                                <p class="help-block"><small>Slider Margin.</small></p>
                                <select class="form-control" name="slidemargin">
                                    <option value="YES" <?php if($data->slidemargin == "YES"){echo "selected";}?>>YES</option>
                                    <option value="NO" <?php if($data->slidemargin == "NO"){echo "selected";}?>>NO</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Speed</label>
                                <p class="help-block"><small>Transition Speed.</small></p>
                                <select class="form-control" name="speed" required>
                                    <option value="1000" <?php if($data->speed == 1000){echo "selected";}?>>1sec</option>
                                    <option value="2000" <?php if($data->speed == 2000){echo "selected";}?>>2sec</option>
                                    <option value="3000" <?php if($data->speed == 3000){echo "selected";}?>>3sec</option>
                                    <option value="4000" <?php if($data->speed == 4000){echo "selected";}?>>4sec</option>
                                    <option value="5000" <?php if($data->speed == 5000){echo "selected";}?>>5sec</option>
                                    <option value="6000" <?php if($data->speed == 6000){echo "selected";}?>>6sec</option>
                                    <option value="7000" <?php if($data->speed == 7000){echo "selected";}?>>7sec</option>
                                    <option value="8000" <?php if($data->speed == 8000){echo "selected";}?>>8sec</option>
                                    <option value="9000" <?php if($data->speed == 9000){echo "selected";}?>>9sec</option>
                                    <option value="10000" <?php if($data->speed == 10000){echo "selected";}?>>10sec</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Auto Play</label>
                                <p class="help-block"><small>Auto sliding images.</small></p>
                                <select class="form-control" name="autoplay">
                                    <option value="YES" <?php if($data->autoplay == "YES"){echo "selected";}?>>YES</option>
                                    <option value="NO" <?php if($data->autoplay == "NO"){echo "selected";}?>>NO</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Loop Play</label>
                                <p class="help-block"><small>Sliding images in loop.</small></p>
                                <select class="form-control" name="loopplay">
                                    <option value="YES" <?php if($data->loopplay == "YES"){echo "selected";}?>>YES</option>
                                    <option value="NO" <?php if($data->loopplay == "NO"){echo "selected";}?>>NO</option>
                                </select>
                            </div>

                        </div>
<!--                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Auto Play</label>
                                <p class="help-block"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</small></p>
                                <select class="form-control">
                                    <option>YES</option>
                                    <option>No</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Push Message</label>
                                    <p class="help-block"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</small></p>
                                    <input class="form-control" id="inputSuccess1" type="text">
                                </div>
                            </div>

                        </div>-->
                        </div>
                    <div class="box-footer">

                        <input type="submit" class = 'btn btn-primary' style = 'float:left;' value="Change setting">
                    </div>

                     <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>
