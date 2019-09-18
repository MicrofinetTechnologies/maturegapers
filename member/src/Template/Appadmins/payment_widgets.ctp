<style>

 .btn-success.active {
  color: #fff;
  background-color: #449d44;
  border-color: #398439
 }
</style>

<div class="content-wrapper">
 <section class="content-header">
  <h1>
   <?php

     echo "Edit payment information";

   ?>
  </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
 </section>
 <!-- Main content -->
 <section class="content">
  <div class="row">
   <!-- left column -->
   <div class="col-xs-12">
    <div class="box box-primary">

    <?= $this->Form->create(null,['type'=>"post"]); ?>
        
        
        <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Border color<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
                    <section class="demo">
                        <div class="center">
                            <div class="border_color"></div>
                        </div>
                    </section>
       </div>
      </div>
        
      <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Text color<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
                    <section class="demo">
                        <div class="center">
                            <div class="text_color"></div>
                        </div>
                    </section>
       </div>
      </div>
        
      <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Inner color<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
                    <section class="demo">
                        <div class="center">
                            <div class="inner_color"></div>
                        </div>
                    </section>
       </div>
      </div>

      <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Payment Widget<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
        <div class="switch-field">
      <input type="radio" id="switch_left" name="visible" value="1" <?php if(isset($datas->visible) && $datas->visible == 1){echo "checked"; } ?> />
      <label for="switch_left">Visible</label>
      <input type="radio" id="switch_right" name="visible" value="0" <?php if(isset($datas->visible) && $datas->visible == 0){echo "checked"; } ?> />
      <label for="switch_right">Invisible</label>
    </div>
       </div>
      </div>
        
       <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Widget Size<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
           <input type='number' name='height' min="0" placeholder="height" value="<?=$datas->height;?>" />  x
        <input type='number' name='width' min="0" placeholder="width" value="<?=$datas->width;?>" />
       </div>
      </div>
        
      
        
     <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Transparency Level<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
           <select name="opacity">
               <?php for($i=0;$i<=10;$i++){ ?>
               <option value="<?=$i;?>" <?php if(isset($datas->opacity) && $datas->opacity == $i){ echo"selected"; } ?> ><?=$i;?></option>
               <?php }  ?>
           </select>
       </div>
      </div>
        
      <div class="col-md-4">
       <div class="form-group">
        <label for="exampleInputEmail">Change Text<span style="color: red;">*</span></label>        
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
           <textarea name="change_text" class="form-control"><?=@$datas->change_text;?></textarea>
       </div>
      </div>
      
     <div class="col-md-4">
       <div class="form-group">
               
       </div>
      </div>
      <div class="col-md-8">
       <div class="form-group">        
           <input type="submit" value="Update" class="btn btn-success">
       </div>
      </div>
       <?=$this->Form->end();?> 
     </div>
     
    </div>
   </div>
 </section>
</div>

<style> 
.switch-field {
  font-family: "Lucida Grande", Tahoma, Verdana, sans-serif; 
  overflow: hidden;
}

.switch-title {
  margin-bottom: 6px;
}

.switch-field input {
    position: absolute !important;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    width: 1px;
    border: 0;
    overflow: hidden;
}

.switch-field label {
  float: left;
}

.switch-field label {
  display: inline-block;
  width: 120px;
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  font-weight: normal;
  text-align: center;
  text-shadow: none;
  padding: 6px 14px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition:    all 0.1s ease-in-out;
  -ms-transition:     all 0.1s ease-in-out;
  -o-transition:      all 0.1s ease-in-out;
  transition:         all 0.1s ease-in-out;
}

.switch-field label:hover {
	cursor: pointer;
}

.switch-field input:checked + label {
  background-color: #A5DC86;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}
.pcr-app{
    z-index: 111111;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/pickr-widget/dist/pickr.min.js"></script>
<script src="gh-page/js/script.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<script>
 $("[name='checkbox3']").bootstrapSwitch({
  on:'Visible',
  off:'Invisible',
  onClass:'success',
  offClass:'warning'
 });
</script>
<script>
    var pageurl="<?=HTTP_ROOT;?>";
const pickr = new Pickr({ 
    el: '.border_color', 
    useAsButton: false,
    disabled: false,
    comparison: true,
    default: '<?=$datas->border_color;?>',
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
             url: pageurl+'appadmins/payment_widgets',
             dataType: 'html',
             data: {border_color:color},
             success: function(res) {
                
             }
         });
    }
});
</script>
<script>
    var pageurl="<?=HTTP_ROOT;?>";
const pickr1 = new Pickr({ 
    el: '.text_color', 
    useAsButton: false,
    disabled: false,
    comparison: true,
    default: '<?=$datas->text_color;?>',
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
             url: pageurl+'appadmins/payment_widgets',
             dataType: 'html',
             data: {text_color:color},
             success: function(res) {
                
             }
         });
    }
});
</script>
<script>
    var pageurl="<?=HTTP_ROOT;?>";
const pickr2 = new Pickr({ 
    el: '.inner_color', 
    useAsButton: false,
    disabled: false,
    comparison: true,
    default: '<?=$datas->inner_color;?>',
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
             url: pageurl+'appadmins/payment_widgets',
             dataType: 'html',
             data: {inner_color:color},
             success: function(res) {
                
             }
         });
    }
});
</script>