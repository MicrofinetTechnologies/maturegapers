<?php $model_name = $this->User->modelHelper($admiddleImg->model_id)->model_name;?>
<!--<a href="<?php //echo HTTP_ROOT.'model-single?name='.$model_name.'-'.$admiddleImg->model_id;?>"><img class="adv2 bounce" src="<?php // echo HTTP_REMOTE . AD_BANNERS . $admiddleImg->image ?>" alt=""></a>-->
<a href="<?= $admiddleImg->c_url;?>"><img class="adv2 bounce" src="<?php  echo HTTP_REMOTE . AD_BANNERS . $admiddleImg->image ?>" alt=""></a>