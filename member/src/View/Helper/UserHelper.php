<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;

class UserHelper extends Helper {
    
    function chkBonusVideo($scene_id = null) {
        $video = TableRegistry::get('ScenesVideos');
        $query = $video->find('all')->where(['scene_id'=>$scene_id,'is_active' => 1,'is_tailer'=>'Is bonus'])->count();
        return $query;
    }

    function bannerHelper($data) {

        $table = TableRegistry::get('Banners');
        $query = $table->find('all')->where(['banner_id' => $data, 'is_active' => 1])->order(['Banners.sort_order' => 'ASC'])->limit(5);
        return $query;
    }

    function banner_widget() {

        $table = TableRegistry::get('Models');
        $query = $table->find('all')->where(['is_active' => 1])->order('rand()');
        return $query;
    }

    function topscenesHelper() {
        $fulldatalist = [];

        $table = TableRegistry::get('Scenes');
        $video = TableRegistry::get('ScenesVideos');
        $photo = TableRegistry::get('ScenesPhotos');
        $view_type_tb = TableRegistry::get('SceneSettings');
        $view_type = $view_type_tb->find('all')->first();
        //pj($view_type);
        if ($view_type->type == "Last created") {
            $query = $table->find('all')->order(['Scenes.id' => 'DESC', 'releasedate <='=>date('Y-m-d')])->where(['is_active' => 1])->first();
        } elseif ($view_type->type == "Random") {
            $query = $table->find('all')->order('rand()')->where(['is_active' => 1, 'releasedate <='=>date('Y-m-d')])->first();
        } elseif ($view_type->type == "Select manually") {
            $query = $table->find('all')->where(['is_active' => 1, 'id' => $view_type->scene_id, 'releasedate <='=>date('Y-m-d')])->first();
        } else {
            $query = $table->find('all')->order(['Scenes.id' => 'DESC', 'releasedate <='=>date('Y-m-d')])->where(['is_active' => 1])->first();
        }
        $photo_count = $photo->find('all')->where(['ScenesPhotos.scene_id' => $query->id, 'ScenesPhotos.is_active' => 1])->count();
        $photoss = $photo->find('all')->where(['ScenesPhotos.scene_id' => $query->id, 'ScenesPhotos.is_active' => 1]);
        $query1 = $video->find('all')->where(['ScenesVideos.scene_id' => $query->id, 'ScenesVideos.is_tailer' => 'Is main'])->order(['sort_order' => 'ASC'])->first();

        $fulldatalist['scene_id'] = $query->id;
        $fulldatalist['scene_name'] = @$query->scene_name;
        $fulldatalist['description'] = @$query->description;
        $fulldatalist['video_file'] = @$query1->video_file;
        $fulldatalist['model_about'] = @$query1->tags;
        $fulldatalist['photo_count'] = @$photo_count;
        $fulldatalist['video_duration'] = @$query1->video_durations;
        $fulldatalist['video_quality'] = @$query1->video_quality;
        $fulldatalist['model_name'] = !empty($query->model1) ? '<a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model1)->model_name . '-' . $query->model1 . '" target="_blank">' . $this->modelHelper($query->model1)->model_name . '</a>' : '';

        $fulldatalist['model_name'] .= !empty($query->model2) ? ', <a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model2)->model_name . '-' . $query->model2 . '" target="_blank">' . $this->modelHelper($query->model2)->model_name . '</a>' : '';

        $fulldatalist['model_name'] .= !empty($query->model3) ? ', <a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model3)->model_name . '-' . $query->model3 . '" target="_blank">' . $this->modelHelper($query->model3)->model_name . '</a>' : '';

        $count = 1;
        foreach ($photoss as $photoid) {
            if ($count <= 4) {
                $fulldatalist['photo' . $count] = @$photoid->gal_name . '/large_' . @$photoid->files_name;
            }
            $count++;
        }
        //pj($photo_count);

        return $fulldatalist;
    }

    function lastscenesHelper($id = null) {
        $fulldatalist = [];
        $query = "";
        $table = TableRegistry::get('Scenes');
        $video = TableRegistry::get('ScenesVideos');
        $photo = TableRegistry::get('ScenesPhotos');
        if (empty($id) || $id == 'null' || is_null($id)) {

            $query = $table->find('all')->order('rand()')->where(['is_active' => 1, 'releasedate <='=>date('Y-m-d')])->first();
        } else {

            $query = $table->find('all')->where(['id' => $id, 'releasedate <='=>date('Y-m-d')])->first();
        }

        $photo_count = $photo->find('all')->where(['ScenesPhotos.scene_id' => $query->id, 'ScenesPhotos.is_active' => 1])->count();
        $photoss = $photo->find('all')->where(['ScenesPhotos.scene_id' => $query->id, 'ScenesPhotos.is_active' => 1]);
        $query1 = $video->find('all')->where(['ScenesVideos.scene_id' => $query->id, 'ScenesVideos.is_tailer' => 'Is main'])->order(['sort_order' => 'ASC'])->first();

        $fulldatalist['scene_id'] = $query->id;
        $fulldatalist['scene_name'] = @$query->scene_name;
        $fulldatalist['description'] = @$query->description;
        $fulldatalist['video_file'] = @$query1->video_file;
        $fulldatalist['model_about'] = @$query1->tags;
        $fulldatalist['photo_count'] = @$photo_count;
        $fulldatalist['video_duration'] = @$query1->video_durations;
        $fulldatalist['video_quality'] = @$query1->video_quality;
        $fulldatalist['model_name'] = !empty($query->model1) ? '<a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model1)->model_name . '-' . $query->model1 . '" target="_blank">' . $this->modelHelper($query->model1)->model_name . '</a>' : '';

        $fulldatalist['model_name'] .= !empty($query->model2) ? ', <a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model2)->model_name . '-' . $query->model2 . '" target="_blank">' . $this->modelHelper($query->model2)->model_name . '</a>' : '';

        $fulldatalist['model_name'] .= !empty($query->model3) ? ', <a href="' . HTTP_ROOT . 'model-single?name=' . $this->modelHelper($query->model3)->model_name . '-' . $query->model3 . '" target="_blank">' . $this->modelHelper($query->model3)->model_name . '</a>' : '';
        $count = 1;
        foreach ($photoss as $photoid) {
            if ($count <= 4) {
                $fulldatalist['photo' . $count] = @$photoid->gal_name . '/large_' . @$photoid->files_name;
            }
            $count++;
        }
        //pj($photo_count);

        return $fulldatalist;
    }

    function scenesImageHelper($data) {

        $table = TableRegistry::get('ScenesPhotos');
        $query = $table->find('all')->where(['is_active' => 1, 'scene_id' => $data])->order(['sort_order' => 'ASC'])->first();

        return $query;
    }

    function scenesVideoHelper($data) {

        $table = TableRegistry::get('ModelVideos');
        $query = $table->find('all')->where(['ModelVideos.id' => $data])->first();
        return $query;
    }

    function scenesHelper($data) {

        $table = TableRegistry::get('Scenes');
        $query = $table->find('all')->where(['Scenes.id' => $data, 'is_active' => 1])->first();
        return $query;
    }

    function modelHelper($data) {

        $table = TableRegistry::get('Models');
        $query = $table->find('all')->where(['Models.id' => $data])->first();
        return $query;
    }

    function scenegalleryphotos($data) {

        $table = TableRegistry::get('ScenesPhotoGallery');
        $query = $table->find('all')->where(['ScenesPhotoGallery.scenes_id' => $data, 'is_active' => 1])->order(['sort_order' => 'ASC'])->first();
        return $query;
    }

    function scenephotos($data, $id) {

        $table = TableRegistry::get('ScenesPhotos');
        $query = $table->find('all')->where(['ScenesPhotos.gal_name' => $data, 'is_active' => 1, 'scene_id' => $id])->order(['sort_order' => 'ASC']);
        return $query;
    }

    function modelphotogallery($data) {

        $table = TableRegistry::get('PhotoGallery');
        $query = $table->find('all')->where(['PhotoGallery.model_id' => $data, 'is_active' => 1])->order(['sort_order' => 'ASC'])->first();
        return $query;
    }

    function modelphotos($data, $id) {

        $table = TableRegistry::get('ModelPhotos');
        $query = $table->find('all')->where(['ModelPhotos.gal_name' => $data, 'is_active' => 1, 'model_id' => $id])->order(['sort_order' => 'ASC']);
        return $query;
    }

    function sceneprophoto($id) {

        $table = TableRegistry::get('ScenesPhotos');
        $query = $table->find('all')->where(['is_active' => 1, 'scene_id' => $id, 'pro_pic' => 1])->order(['sort_order' => 'ASC'])->first();
        if (empty($query)) {
            $query = $table->find('all')->where(['is_active' => 1, 'scene_id' => $id])->order(['sort_order' => 'ASC'])->first();
        }
        return $query;
    }

    function scenevideocheck($id, $type) {

        $table = TableRegistry::get('ScenesVideos');
        $query = $table->find('all')->where(['scene_id' => $id, 'is_active' => 1, 'is_tailer' => $type])->count();

        return $query;
    }

    function scenevideohdcheck($id) {

        $table = TableRegistry::get('ScenesVideos');
        $query = $table->find('all')->where(['scene_id' => $id, 'is_active' => 1]);
        $hd = "";
        foreach ($query as $val) {
            if (in_array("720p", explode(",", $val->video_quality))) {
                $hd = 1;
            } else if (in_array("Full HD", explode(",", $val->video_quality))) {
                $hd = 1;
            }
        }
        return $hd;
    }

    function scenevideo4kcheck($id) {

        $table = TableRegistry::get('ScenesVideos');
        $query = $table->find('all')->where(['scene_id' => $id, 'is_active' => 1]);
        $hd = "";
        foreach ($query as $val) {
            if (in_array("4K", explode(",", $val->video_quality))) {
                $hd = 1;
            }
        }
        return $hd;
    }

    function scenephoto($id = null) {
        $table = TableRegistry::get('CoverMainPhotos');
        $query = $table->find('all')->where(['ref_id' => $id, 'is_active' => 1, 'page_type' => 1, 'photo_type' => 1])->order(['sort_order' => 'ASC'])->limit(4);
        return $query;
    }

    function scenesngphoto($id = null) {
        $table = TableRegistry::get('CoverMainPhotos');
        $query = $table->find('all')->where(['ref_id' => $id, 'is_active' => 1, 'page_type' => 1, 'photo_type' => 2])->order(['sort_order' => 'ASC'])->first();
        return $query;
    }

    function scenecover5($id = null) {
        $table = TableRegistry::get('CoverMainPhotos');
        $query = $table->find('all')->where(['ref_id' => $id, 'is_active' => 1, 'page_type' => 1, 'photo_type' => 3])->order(['sort_order' => 'ASC'])->limit(5);
        return $query;
    }

    function modelcover5($id = null) {
        $table = TableRegistry::get('CoverMainPhotos');
        $query = $table->find('all')->where(['ref_id' => $id, 'is_active' => 1, 'page_type' => 2, 'photo_type' => 3])->order(['sort_order' => 'ASC'])->limit(5);
        return $query;
    }

    function number_pad($number, $n = 4) {
        $number = intval($number, 10);
        $number = (string) $number;
        return str_pad((int) $number, $n, "0", STR_PAD_LEFT);
    }

    function singlescenephotos($id) {

        $table = TableRegistry::get('ScenesPhotos');
        $query = $table->find('all')->where(['is_active' => 1, 'scene_id' => $id])->count();
        return $query;
    }

}

?>
