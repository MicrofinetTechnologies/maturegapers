<script type="text/javascript" src="<?php echo HTTP_ROOT . 'js/' ?>jquery-ui.js"></script>

<?php
@$param2 = $this->request->params['pass'][1];
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Website icon listing</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  style="color: red;font-size: 15px;" onclick="$('#manage_banner').slideToggle(1000)" class="active" href="javascript:void(0);"> <i class="fa fa-book"></i><?php echo "Create new  Website icon"; ?></a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div id="error_msg_date" class="help-block with-errors"></div>
                    <div id="manage_banner" class="box box-default"  style="<?php echo ($param2) ? 'border-top: none; display: block;' : 'border-top: none; display: none;'; ?>">
                        <div class="box-header with-border1">
                            <h3 class="box-title">
                                <?php
                                echo " Add Social Media";
                                ?>
                            </h3>
                            <div class="box-tools pull-right">
                                <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-primary">
                                        <?= $this->Form->create(null, array('data-toggle' => "validator", 'id' => 'bannerform', 'type' => 'file')); ?>
                                        <div class="box-body">
                                            <p style="color: red;">All (*) fields are mandatory</p>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Name <span style="color: red;">*</span></label>

                                                        <?php
                                                        if (@$id) {
                                                            echo $this->Form->input('id', ['type' => 'hidden', 'value' => @$dataEdit->id]);
                                                        }
                                                        echo @$dataEdit->name;
                                                        ?>

                                                        <?= $this->Form->input('name', ['class' => "form-control", 'label' => false, 'data-error' => 'Please enter website icon name', 'required' => "required", 'maxlength' => 20, 'value' => @$dataEdit->name]); ?>
                                                        <p style="font-size: 12px;">Note: <span>Name should not be more than 20 char</span>.</p>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group">


                                                        <label for="exampleInputFile">Icon Code <span style="color: red;">*</span></label>

                                                        <?= $this->Form->input('icon_code', ['class' => "form-control", 'label' => false, 'data-error' => 'Please enter website icon code', 'required' => "required", 'maxlength' => 2000, 'value' => @$dataEdit->icon_code]); ?>

                                                        <div class="help-block with-errors"></div>




                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail">Border color<span style="color: red;">*</span></label>        

                                                        <section class="demo">
                                                            <div class="center">
                                                                <div class="border_color"></div>
                                                            </div>
                                                        </section>
                                                        <?= $this->Form->input('border_color', ['id' => 'border_color', 'readonly' => 'readonly', 'class' => "form-control", 'label' => false, 'required' => "required", 'value' => @$dataEdit->border_color]); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail">Text color<span style="color: red;">*</span></label>        
                                                        <section class="demo">
                                                            <div class="center">
                                                                <div class="text_color"></div>
                                                            </div>
                                                        </section>
                                                        <?= $this->Form->input('color_text', ['id' => 'color_text', 'readonly' => 'readonly', 'class' => "form-control", 'label' => false, 'required' => "required", 'value' => @$dataEdit->color_text]); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail">Back ground color<span style="color: red;">*</span></label>        
                                                        <section class="demo">
                                                            <div class="center">
                                                                <div class="back_color"></div>
                                                            </div>
                                                        </section>
                                                        <?= $this->Form->input('back_ground_color', ['id' => 'back_ground_color', 'readonly' => 'readonly', 'class' => "form-control", 'label' => false, 'required' => "required", 'value' => @$dataEdit->back_ground_color]); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <?= $this->Form->button('Save', ['class' => 'btn btn-success', 'id' => 'add', 'style' => 'margin-left:15px;']) ?>
                                        </div>
                                        <?= $this->Form->end() ?>
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->

                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Website icon Listing</h3>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th></th>
                                    <th>Name</th>
                                    <th>Code</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <?php foreach ($webListings as $list): ?>
                                    <tr id="arrayorder" class="message_box ui-sortable-handle">
                                        <td data-placement="top" data-hint="Move" class="hint--top  hint"><img src="<?php echo HTTP_ROOT; ?>img/arrow.png" class="move" style="cursor:move;" /></td>
                                        <td style="text-align:  left;"> <?php echo $list->name; ?></td>
                                        <td style="text-align:  left;"><?php echo htmlspecialchars($list->icon_code); ?></td>

                                        <td style="text-align: center; width: 20%">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'website_icon', $list->id, 'WebsiteIcon'], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?php if ($list->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $list->id . '/WebsiteIcon'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $list->id . '/WebsiteIcon'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'delete', $list->id, 'WebsiteIcon'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete  ?')]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.js"></script>
<script src="gh-page/js/script.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>


<script>
                var pageurl = "<?= HTTP_ROOT; ?>";
                var colorDefualt = $('#border_color').val();
                if (colorDefualt == '') {
                    colorDefualt = '#7C2D2D';
                }
                const pickr = new Pickr({
                    el: '.border_color',
                    useAsButton: false,
                    disabled: false,
                    comparison: true,
                    default: colorDefualt,
                    defaultRepresentation: 'HEX',
                    showAlways: false,
                    appendToBody: false,
                    closeWithKey: 'Escape',
                    position: 'middle',
                    adjustableNumbers: true,
                    components: {
                        preview: true,
                        opacity: true,
                        hue: true,
                        interaction: {
                            hex: false,
                            rgba: false,
                            hsla: false,
                            hsva: false,
                            cmyk: false,
                            input: true,
                            clear: false,
                            save: true
                        },
                    },
                    strings: {
                        save: 'Save',
                        clear: 'Clear'
                    },
                    onChange(hsva, instance) {
                        hsva;
                        instance;
                    },
                    onSave(hsva, instance) {
                        var color = hsva.toHEX().toString();
                        $('#border_color').val(color);
                    }
                });
</script>
<script>
    var colorDefualt1 = $('#color_text').val();
    if (colorDefualt1 == '') {
        colorDefualt1 = '#7C2D2D';
    }
    const pickr1 = new Pickr({
        el: '.text_color',
        useAsButton: false,
        disabled: false,
        comparison: true,
        default: colorDefualt1,
        defaultRepresentation: 'HEX',
        showAlways: false,
        appendToBody: false,
        closeWithKey: 'Escape',
        position: 'middle',
        adjustableNumbers: true,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: false,
                rgba: false,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: true,
                clear: false,
                save: true
            },
        },
        strings: {
            save: 'Save',
            clear: 'Clear'
        },
        onChange(hsva, instance) {
            hsva;
            instance;
        },
        onSave(hsva, instance) {
            var color = hsva.toHEX().toString();
            $('#color_text').val(color);
        }
    });

    var colorDefualt2 = $('#back_ground_color').val();

    if (colorDefualt2 == '') {
        colorDefualt2 = '#7C2D2D';
    }
    const pickr2 = new Pickr({
        el: '.back_color',
        useAsButton: false,
        disabled: false,
        comparison: true,
        default: colorDefualt2,
        defaultRepresentation: 'HEX',
        showAlways: false,
        appendToBody: false,
        closeWithKey: 'Escape',
        position: 'middle',
        adjustableNumbers: true,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: false,
                rgba: false,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: true,
                clear: false,
                save: true
            },
        },
        strings: {
            save: 'Save',
            clear: 'Clear'
        },
        onChange(hsva, instance) {
            hsva;
            instance;
        },
        onSave(hsva, instance) {
            var color = hsva.toHEX().toString();
            $('#back_ground_color').val(color);
        }
    });
</script>
