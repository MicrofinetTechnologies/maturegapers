<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?=

     __('Theme Setting');

   ?>
  </h1>
  <?php if ($type == 1) { ?>
     <ol class="breadcrumb">
      <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

     </ol>
    <?php } else { ?>

     <ol class="breadcrumb">
      <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

     </ol>

    <?php } ?>
 </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            
            <div class="box">
                <div style=" height: 10px;"></div>
                <div style=" height: 50px;">
                <div class="col-md-3">
                    <label>Background color</label><br>
                    <small class="text-danger">Default <strong>Background color :   </strong></small>
                </div>
                <div class="col-md-9">
                    <section class="demo">
                        <div class="center">
                            <div class="color-picker"></div>
                        </div>
                    </section>
                    
                </div>                
                </div>
                
                <div  style="height: 50px;">
                <div class="col-md-3">
                    <label>Text color</label><br>
                    <small class="text-danger">Default <strong>Text color :   </strong></small>
                </div>
                <div class="col-md-9">
                    <section class="demo">
                        <div class="center">
                            <div class="color-picker1"></div>
                        </div>
                    </section>
                    
                </div>
                </div>
                
                <div  style="height: 50px;">
                <div class="col-md-3">
                    <label>Hovor color</label><br>
                    <small class="text-danger">Default <strong>Hovor color :   </strong></small>
                </div>
                <div class="col-md-9">
                    <section class="demo">
                        <div class="center">
                            <div class="color-picker2"></div>
                        </div>
                    </section>
                    
                </div>
                </div>
            </div>                
            </div>
        </div>
    </section>

</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.js"></script>
<script src="gh-page/js/script.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<script>
    var pageurl="<?=HTTP_ROOT;?>";
const pickr = new Pickr({ 
    el: '.color-picker', 
    useAsButton: false,
    disabled: false,
    comparison: true,
    default: '<?=$colordata->bg_color;?>',
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
        jQuery.ajax({
             type: "POST",
             url: pageurl+'appadmins/skincolor',
             dataType: 'html',
             data: {bg_color:color},
             success: function(res) {
                
             }
         });
    }
});
</script>
<script>
const pickr1 = new Pickr({
    el: '.color-picker1',
    useAsButton: false,
    disabled: false,
    comparison: true,   
    default: '<?=$colordata->text_color;?>',
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
        //alert(hsva.toHEX().toString())
        var color = hsva.toHEX().toString();
        jQuery.ajax({
             type: "POST",
             url: pageurl+'appadmins/skincolor',
             dataType: 'html',
             data: {text_color:color},
             success: function(res) {
               
             }
         });
    }
});
</script> 
<script>
const pickr2 = new Pickr({
    el: '.color-picker2',
    useAsButton: false,
    disabled: false,
    comparison: true,   
    default: '<?=$colordata->hovor_color;?>',
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
        //alert(hsva.toHEX().toString())
        var color = hsva.toHEX().toString();
        jQuery.ajax({
             type: "POST",
             url: pageurl+'appadmins/skincolor',
             dataType: 'html',
             data: {hovor_color:color},
             success: function(res) {
               
             }
         });
    }
});
</script> 