<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

require_once(ROOT . '/vendor/' . DS . '/phpoffice/vendor/autoload.php');
require_once(ROOT . '/vendor/' . DS . 'getID3-master/getid3/getid3.php');

use \PHPExcel_IOFactory;

class AppadminsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
//    $this->loadComponent('Phpoffice');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Pages');
        $this->loadModel('Banners');
        $this->loadModel('Scenes');
        $this->loadModel('Models');
        $this->loadModel('ModelContains');
        $this->loadModel('ModelVideos');
        $this->loadModel('ModelPhotos');
        $this->loadModel('ModelUrl');
        $this->loadModel('Memberships');
        $this->loadModel('WelcomeCms');
        $this->loadModel('SocialMedia');
        $this->loadModel('FooterSettings');
        $this->loadModel('Map');
        $this->loadModel('Settings');
        $this->loadModel('PaymentGetways');
        $this->loadModel('Bannersettings');
        $this->loadModel('AdBannners');
        $this->loadModel('WebsiteIcon');
        $this->loadModel('SetModel');
        $this->loadModel('GeneralSettings');
        $this->loadModel('Skincolor');
        $this->loadModel('ModelBanners');
        $this->loadModel('PhotoGallery');
        $this->loadModel('ScenesPhotoGallery');
        $this->loadModel('ScenesPhotos');
        $this->loadModel('ScenesVideos');
        $this->loadModel('PaymentWidget');
        $this->loadModel('HomeCms');
        $this->loadModel('CommericalBanners');
        $this->loadModel('CoverMainPhotos');
        $this->loadModel('OurSites');
        $this->loadModel('OurSitesPhotos');
        $this->loadModel('WatermarkSettings');
        $this->loadModel('Color');
        $this->viewBuilder()->layout('admin');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['videoDelete', 'settingBanner', 'modelUrl', 'modelalldata', 'generalSetting', 'skincolor', 'modelOrder', 'createGallary']);
    }

    public function index($id = null) {
        $this->viewBuilder()->layout('admin');
        $totalSceneCount = $this->Scenes->find('all')->count();
        $totalModelCount = $this->Models->find('all')->count();
        $totalVideoCount = $this->ScenesVideos->find('all')->count();
        $totalPhotoCount = $this->ModelPhotos->find('all')->count();
        $totalPhotoSceneCount = $this->ScenesPhotos->find('all')->count();

        $sceneLists = $this->Scenes->find('all')->limit(8)->order(['Scenes.id' => 'DESC']);
        $this->Models->hasOne('ModelPhotos', ['className' => 'ModelPhotos', 'foreignKey' => 'model_id', 'conditions' => ['ModelPhotos.pro_pic' => 1]]);
        $modelLists = $this->Models->find('all')->limit(8)->order(['Models.id' => 'DESC']);
        // pj($modelLists); exit;


        $dataListings = $this->Users->find('all')->where(['Users.type' => 2])->order(['Users.id' => 'DESC']);
        $totalPhoto = $totalPhotoSceneCount + $totalPhotoCount;


        $this->set(compact('totalSceneCount', 'totalModelCount', 'totalPhoto', 'totalVideoCount', 'sceneLists', 'modelLists', 'dataListings'));
    }

    public function themeSetting() {
        $colordata = $this->Skincolor->find('all')->where(['id' => 1])->first();
        $this->set(compact('colordata'));
    }

    public function profile($param = null) {
        $user_id = $this->request->session()->read('Auth.User.id');
        $rowname = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $getCurPassword = $this->Users->find('all', ['fields' => ['password']])->where(['Users.id' => $user_id])->first();

        $row = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $type = $this->request->session()->read('Auth.User.type');
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;


            $user = $this->Users->patchEntity($user, $data);
            $user->id = $this->request->session()->read('Auth.User.id');
            if (!empty($data['map']) == 'Save') {
                $map = $this->Map->newEntity();
                if ($data['code']) {
                    $map->code = $data['code'];
                    $map->id = 1;
                    $this->Map->save($map);
                    $this->Flash->success(__('Map code is updated successfully.'));
                    return $this->redirect(['action' => 'profile/contact-map']);
                } else {
                    $this->Flash->error(__('Code fields is empty.'));
                    return $this->redirect(['action' => 'profile/contact-map']);
                }
            } else if (!empty($data['changepassword']) == 'Change password') {
                $passCheck = $this->Users->check($data['current_password'], $getCurPassword->password);
                if ($passCheck != 1) {
                    $this->Flash->error(__('Current password is incorrect.'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else if ($data['password'] != $data['cpassword']) {
                    $this->Flash->error(__('Password and Confirm password fields do not match'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password has been chaged successfully.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {
                        $this->Flash->error(__('Password could not be change. Please, try again.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else if ($data['general'] == 'save') {
                $set = $this->request->data;
                foreach ($set as $kehfhy => $value) {
                    $condition = array('name' => $kehfhy);
                    $this->Settings->updateAll(['value' => $value], ['name' => $kehfhy]);
                }
                $this->Flash->success(__('Communication emaill has been updated successfully.'));
                $this->redirect(HTTP_ROOT . 'appadmins/profile/communication');
            } else {
                if (@$data['name'] == '') {
                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {
                    $this->Flash->error(__("Please enter your email"));
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The Profile has been update.'));
                        return $this->redirect(['action' => 'profile']);
                    } else {
                        $this->Flash->error(__('The Profile could not be update. Please, try again.'));
                    }
                }
            }
        }
        $row = $this->Map->find('all')->where(['Map.id' => 1])->first();
        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2]);
        $settings = $this->Settings->find('all', ['order' => 'Settings.id DESC'])
                ->where(['Settings.type' => 1, 'Settings.is_active' => 1]);
        $this->set(compact('rowname', 'settings', 'settingsEmailTempletes', 'row', 'user', 'row', 'options', 'param'));
    }

    public function photoDelete() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $id = $data['id'];
        if ($id) {
            $list = $this->Photos->find('all', ['Fields' => ['file_name']])->where(['Photos.id' => $id])->first();
            unlink(PHOTO . $list->file_name);
            $delete = $this->Photos->get($id);
            $this->Photos->delete($delete);
            echo json_encode(['status' => 'success', 'msg' => 'Photo is deleted']);
        }
        exit;
    }

    public function delete($id = null, $table = null) {
        $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
        $data = $this->$table->get($id);
        $dataDelete = $this->$table->delete($data);
        if ($table == 'Banners') {
            $this->Flash->success(__('Banner has been deleted.'));
            unlink(WWW_ROOT . BANNERS . "\\" . $getDetail->image);
            return $this->redirect(HTTP_ROOT . 'appadmins/manage_banner');
        }
        if ($table == 'Scenes') {
            $this->SetModel->deleteAll(['scenes_id' => $id]);
            $this->Flash->success(__('Scenes has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/scenes');
        }
        if ($table == 'Model') {
            $this->Flash->success(__('Model has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_model/' . $getDetail->scenes_id);
        }
        if ($table == 'ScenesVideos') {
            unlink(VIDEOS . $getDetail->scene_id . '/' . $getDetail->video_file);
            if ($getDetail->is_tailer == "Is tailer ") {
                $this->Flash->success(__('Scene Video has been deleted.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/scenetrailer_video/' . $getDetail->scene_id);
            } elseif ($getDetail->is_tailer == "Is main ") {
                $this->Flash->success(__('Scene Video has been deleted.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/scenemain_video/' . $getDetail->scene_id);
            } elseif ($getDetail->is_tailer == "Is bonus ") {
                $this->Flash->success(__('Scene Video has been deleted.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/scenebonus_video/' . $getDetail->scene_id);
            }
        }
        if ($table == 'PhotoGallery') {
            $this->ModelPhotos->deleteAll(['model_id' => $getDetail->model_id, 'gal_name' => $getDetail->name]);
            $dir = PHOTOS . $getDetail->model_id . '/' . $getDetail->name;
            array_map('unlink', glob("$dir/*.*"));
            rmdir($dir);
            $this->Flash->success(__('Model Gallery has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_photo/' . $getDetail->model_id);
        }
        if ($table == 'ScenesPhotoGallery') {
            $this->ScenesPhotos->deleteAll(['scene_id' => $getDetail->scenes_id, 'gal_name' => $getDetail->name]);
            $dir = PHOTOS . 'scenes/' . $getDetail->scenes_id . '/' . $getDetail->name;
            array_map('unlink', glob("$dir/*.*"));
            rmdir($dir);
            $this->Flash->success(__('Scene Gallery has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/scenesphoto_gallery/' . $getDetail->scenes_id);
        }
        if ($table == 'ModelPhotos') {
            unlink(PHOTOS . $getDetail->model_id . '/' . $getDetail->gal_name . '/' . $getDetail->files_name);
//            unlink(PHOTOS . $getDetail->model_id . '/' . $getDetail->gal_name . '/large_' . $getDetail->files_name);
//            unlink(PHOTOS . $getDetail->model_id . '/' . $getDetail->gal_name . '/thumb_' . $getDetail->files_name);
            $this->Flash->success(__('Model photo has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/managemodel_photos/' . $getDetail->model_id . '/' . $getDetail->gal_name);
        }
        if ($table == 'ScenesPhotos') {
            unlink(PHOTOS . 'scenes/' . $getDetail->scene_id . '/' . $getDetail->gal_name . '/' . $getDetail->files_name);
//            unlink(PHOTOS . 'scenes/' . $getDetail->scene_id . '/' . $getDetail->gal_name . '/large_' . $getDetail->files_name);
//            unlink(PHOTOS . 'scenes/' . $getDetail->scene_id . '/' . $getDetail->gal_name . '/thumb_' . $getDetail->files_name);
            $this->Flash->success(__('Scenes photo has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/managemscenes_photos/' . $getDetail->scene_id . '/' . $getDetail->gal_name);
        }
        if ($table == 'CoverMainPhotos') {
            unlink(PHOTOS . $getDetail->photo_name);
            $this->Flash->success(__('Photo deleted successfully.'));
            $this->redirect($this->referer());
        }
        if ($table == 'Memberships') {
            $this->Flash->success(__('Memberships plan  has been deleted.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_membership/');
        }if ($table == 'SocialMedia') {
            $this->Flash->success(__('Social data has been deleted.'));
            // unlink(WWW_ROOT . SOCIAL_ICON . "\\" . $getDetail->image);
            return $this->redirect(HTTP_ROOT . 'appadmins/social_media');
        }if ($table == 'AdBannners') {
            $this->Flash->success(__('Ad  data has been deleted.'));
            unlink(WWW_ROOT . AD_BANNERS . "\\" . $getDetail->image);
            return $this->redirect(HTTP_ROOT . 'appadmins/ad_banner');
        }
        if ($table == 'OurSites') {
            $this->Flash->success(__(' Data has been deleted.'));
            unlink(WWW_ROOT . OURSITES . "\\" . $getDetail->image);
            return $this->redirect(HTTP_ROOT . 'appadmins/our_sites');
        }
        if ($table == 'CommericalBanners') {

            $this->Flash->success(__('Ad  data has been deleted.'));
            unlink(WWW_ROOT . AD_BANNERS . "\\" . $getDetail->image);
            if ($getDetail->type == 1) {
                return $this->redirect(HTTP_ROOT . 'appadmins/left_banner');
            } else {
                return $this->redirect(HTTP_ROOT . 'appadmins/middle_banner');
            }
        }
        if ($table == 'Color') {

            $this->Flash->success(__('Color has been deleted.'));
            if ($getDetail->type == 1) {
                return $this->redirect(HTTP_ROOT . 'appadmins/model_hair_color');
            } else {
                return $this->redirect(HTTP_ROOT . 'appadmins/model_eye_color');
            }
        } else {
            $this->Flash->success(__('Data has been deleted successfully.'));
            $this->redirect($this->referer());
        }
    }

    public function deactive($id = null, $table = null) {
        $active_column = 'is_active';
        if ($this->$table->query()->update()->set([$active_column => 0])->where(['id' => $id])->execute()) {

            if ($table == 'Models') {
                $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
                $this->Flash->success(__('Model has been deactivated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/model_setting/' . $getDetail->id);
            }

            else if ($table == 'ModelPhotos') {
                $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
                $this->Flash->success(__('Model photo has been deactivated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/managemodel_photos/' . $getDetail->model_id . '/' . $getDetail->gal_name);
            }
            else if ($table == 'Memberships') {
                $this->Flash->success(__('Membership plan  has been deactivated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_membership/');
            }else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been deactivated.'));
                $this->redirect($this->referer());
            }
            else if ($table == 'AdBannners') {
                $this->Flash->success(__('Ad banners  has been deactivated.'));
                $this->redirect($this->referer());
            }
            else if ($table == 'CommericalBanners') {
                $this->Flash->success(__('Commerical banners  has been deactivated.'));
                $this->redirect($this->referer());
            }
            else if ($table == 'OurSites') {
                $this->Flash->success(__('Data  has been deactivated.'));
                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('DAta has been deactivated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function active($id = null, $table = null) {
        $active_column = 'is_active';
        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {


            if ($table == 'Models') {
                $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
                $this->Flash->success(__('Model has been activated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/model_setting/' . $getDetail->id);
            }
            else if ($table == 'ModelPhotos') {
                $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
                $this->Flash->success(__('Model photo has been activated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/managemodel_photos/' . $getDetail->model_id . '/' . $getDetail->gal_name);
            }
            else if ($table == 'Memberships') {

                $this->Flash->success(__('Memberships plan  has been activated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_membership/');
            }
            else if ($table == 'SocialMedia') {
                $this->Flash->success(__('Social data has been activated.'));
                $this->redirect($this->referer());
            } else if ($table == 'AdBannners') {
                $this->Flash->success(__('Ad banners  has been activated.'));
                $this->redirect($this->referer());
            }
            else if ($table == 'CommericalBanners') {
                $getDetail = $this->$table->find('all')->where([$table . '.id' => $id])->first();
                if($getDetail->type == 1){
                    $this->CommericalBanners->updateAll(['is_active' => 0], ['id !=' => $id,'type'=>1]);
                }
                if($getDetail->type == 2){
                    $this->CommericalBanners->updateAll(['is_active' => 0], ['id !=' => $id,'type'=>2]);
                }
                
                $this->Flash->success(__('Commerical banner  has been activated.'));
                $this->redirect($this->referer());
            }
            else if ($table == 'OurSites') {
                $this->Flash->success(__('Data  has been activated.'));
                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('Data has been activated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function manageBanner($id = null) {
        $banners = $this->Banners->newEntity();
        if ($id) {
            $editBanner = $this->Banners->find('all')->where(['Banners.id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $banners = $this->Banners->patchEntity($banners, $data);
            $banners->is_active = 1;
            if ($id) {
                if (!empty($data['image']['tmp_name'])) {
                    $edito = $this->Banners->find('all')->where(['Banners.id' => $id])->first();
                    $filename = BANNER_IMAGES . $edito->image;
                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                } else {
                    $editoBanner = $this->Banners->find('all')->where(['Banners.id' => $id])->first();
                    $banners->id = $id;
                    $banners->image = $editoBanner->image;
                }
            }
            if (!empty($data['image']['tmp_name'])) {
                $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], BANNER_IMAGES, 1820);
                $banners->image = $imageName;
            }
            if ($id) {
                $banners->id = $id;
                $bannerData = $this->Banners->save($banners);
                $this->Flash->success(__('Banner  updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/manage_banner');
            } else {
                $bannerData = $this->Banners->save($banners);
                $this->Flash->success(__('Banner added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/manage_banner');
            }
        }
        $bannerListings = $this->Banners->find('all')->order(['Banners.sort_order']);
        $this->set(compact('id', 'editBanner', 'bannerListings'));
    }

    public function welcomeCms() {
        $this->viewBuilder()->layout('admin');
        $welcomeCms = $this->WelcomeCms->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $welcomeCms->id = 1;
            $welcomeCms = $this->WelcomeCms->patchEntity($welcomeCms, $data);
            $this->WelcomeCms->save($welcomeCms);
            $this->Flash->success(__('Data has been update successfully.'));
        }
        $data = $this->WelcomeCms->find('all')->where(['WelcomeCms.id' => 1])->first();
        $this->set(compact('welcomeCms', 'data'));
    }

    public function footerCms($id = null) {
        if ($id) {
            $row = $this->FooterSettings->find('all')->where(['FooterSettings.id' => $id])->first();
        }
        $dataEntity = $this->FooterSettings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->FooterSettings->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->FooterSettings->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/footer_cms');
        }
        $dataListings = $this->FooterSettings->find('all')->order(['FooterSettings.id']);
        $this->set(compact('row', 'id', 'dataEntity', 'dataListings'));
    }

    public function metaTitle($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('Meta data  has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/meta_title');
        }
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'row', 'dataEntity'));
    }

    public function cmsPage() {
        $dataListings = $this->Pages->find('all')->where(['Pages.id IN' => [10, 11, 12, 13, 14]])->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings'));
    }

    public function editpages($id = null) {
        if ($id) {
            $row = $this->Pages->find('all')->where(['Pages.id' => $id])->first();
        }
        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $dataEntity->modified = date('Y-m-d H:i:s');
            $this->Pages->save($dataEntity);
            $this->Flash->success(__('Page data has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/editpages/' . $data['id']);
        }
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'row', 'dataEntity'));
    }

    public function dateWise() {
        $this->viewBuilder()->layout('admin');
        if ($this->request->is('post')) {
            $data = array_filter($this->request->data);
            $queryString = http_build_query($data);
            if (!empty($queryString)) {
                $queryString = '?' . $queryString;
            }
            return $this->redirect(HTTP_ROOT . 'appadmins/date_wise' . $queryString);
        }
        $data = $this->Custom->filterData($this->request->query);
        if (@$data['from_dt'] == '') {
            //$this->Flash->error(__('Plese select from date'));
        } else {
            @$fromDate = $data['from_dt'];
            @$toDate = $data['to_dt'];
            if ($data['from_dt']) {
                $dbfromDate = date('Y-m-d', strtotime($fromDate));
            }
            if (@$data['to_dt']) {
                $dbtoDate = date('Y-m-d', strtotime($toDate));
            } else {
                $dbtoDate = date('Y-m-d');
            }

            if (isset($fromDate)) {
                $this->EventBookings->belongsTo('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_schedule_id']);
                @$ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['DATE(EventBookings.created) >= ' => $dbfromDate, 'DATE(EventBookings.created) <=' => $dbtoDate, 'EventBookings.payment_status' => 1])->order(['EventBookings.created' => 'DESC']);

                //pj($ticketDetails);
            }
        }
        $this->set(compact('ticketDetails', 'fromDate', 'toDate', 'dbfromDate', 'dbtoDate'));
    }

    public function dateWiseReports($fromDate = null, $toDate = null) {
        $this->viewBuilder()->layout('admin');
        if ($fromDate && $toDate) {
            $this->EventBookings->belongsTo('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_schedule_id']);
            @$ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['DATE(EventBookings.created) >= ' => $fromDate, 'DATE(EventBookings.created) <=' => $toDate, 'EventBookings.payment_status' => 1])->order(['EventBookings.created' => 'DESC',]);
        }
        $count = 0;
        foreach ($ticketDetails as $tkt) {
            $payments[$count]['ticket'] = $tkt->unique_id;
            $payments[$count]['name'] = $tkt->first_name . ' ' . $tkt->last_name;
            $payments[$count]['phone'] = $tkt->phone;
            $payments[$count]['purchase_date'] = date('d-m-Y', strtotime($tkt->created));
            $payments[$count]['qty'] = $tkt->ticket_no;
            $payments[$count]['total'] = number_format((float) $tkt->total_amount, 2, '.', '');
            $payments[$count]['mode'] = ($tkt->payment_mode == 1) ? "Online" : "Offiline";
            $payments[$count]['status'] = ($tkt->payment_status == 1) ? "Paid" : "Pending";
            $count++;
        }
        $fileName = strtotime(date('Y-m-d H:i:s'));
        $file_name = $this->Custom->downloadCustomerReport($payments, $fileName);
        header('location:' . HTTP_ROOT . EXCEL . $file_name);
        exit;
    }

    public function editMailTempletes($id = null) {
        $this->viewBuilder()->layout('admin');
        $row = $this->Settings->find('all')->where(['Settings.id' => $id])->first();
        $dataEntity = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Settings->patchEntity($dataEntity, $data);
            $this->Settings->save($dataEntity);
            $this->Flash->success(__('Email templet has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/profile/emailTemplete');
        }
        $this->set(compact('id', 'row'));
    }

    public function createAdmin($id = null) {
        $admin = $this->Users->newEntity();
        if ($id) {
            $editAdmin = $this->Users->find('all')->where(['Users.id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $admin = $this->Users->patchEntity($admin, $data);
            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            $password = @$data['password'];
            $conpassword = @$data['cpassword'];
            if ($exitEmail >= 1) {
                $this->Flash->error(__('This  Email is already exists.'));
            }
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {
                $admin->unique_id = $this->Custom->generateUniqNumber();
                $admin->created = date("Y-m-d H:i:s");
                $admin->modified = date("Y-m-d H:i:s");
                $admin->is_active = 1;
                $admin->type = 2;
                if ($id) {
                    $admin->id = $id;
                } else {
                    $admin->id = '';
                }
                if ($this->Users->save($admin)) {
                    if ($id) {
                        $this->Flash->success(__('Data updated successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/' . $id);
                    } else {
                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $to = $admin->email;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display;
                        $sitename = SITE_NAME;
                        $password = $password;
                        $message = $this->Custom->createAdminFormat($emailMessage->value, $admin->name, $admin->email, $password, $sitename);
                        $this->Custom->sendEmail($to, $from, $subject, $message);
                        $this->Flash->success(__('Data add successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                    }
                }
            }
        }
        $this->set(compact('admin', 'id', 'editAdmin'));
    }

    public function viewAdmin() {
        $adminLists = $this->Users->find('all', ['Users.id' => 'DESC'])->where(['Users.type' => 2]);
        $this->set(compact('adminLists'));
    }

    public function viewBanner($id = null) {
        $bannerlisting = $this->Banners->find('all')->where(['Banners.banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        //pj($bannerlisting);
        if (isset($id) && !empty($id)) {
            $editoBanner = $this->Banners->find('all')->where(['Banners.id' => $id])->first();
        }
        $banners = $this->Banners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $banners = $this->Banners->patchEntity($banners, $data);
            $banners->is_active = 1;


            if (!empty($data['image']['tmp_name'])) {
                $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], BANNERS, 1820);
                $banners->image = $imageName;
            } else {
                $image = $this->Banners->find('all')->where(['Banners.id' => $data['id']])->first();
                $banners->image = $image->image;
            }

            $bannerData = $this->Banners->save($banners);
            if (isset($data['id']) && !empty($data['id'])) {
                $this->Flash->success(__('Banner Update successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_banner/' . $data['id']);
            } else {
                $this->Flash->success(__('Banner added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_banner');
            }
        }


        $allscene = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);

        $this->set(compact('bannerlisting', 'editoBanner', 'id', 'bannerimg', 'allscene'));
    }

    public function adBanner($id = null) {
        $listingSingle = $this->AdBannners->find('all')->order(['AdBannners.id' => 'DESC'])->first();
        $bannerlisting = $this->AdBannners->find('all')->order(['AdBannners.id' => 'ASC']);
        //pj($bannerlisting);

        $ad_id = $this->Custom->number_pad(@$listingSingle->id + 1, $n = 4);

        if (isset($id) && !empty($id)) {
            $editRow = $this->AdBannners->find('all')->where(['AdBannners.id' => $id])->first();
        }
        $banners = $this->AdBannners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;


            $banners = $this->AdBannners->patchEntity($banners, $data);
            $banners->is_active = 1;
            $banners->created_dt = date('Y-m-d H:i:s');

            if (!empty($data['image']['tmp_name'])) {
                $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], AD_BANNERS, 1820);
                $banners->image = $imageName;
            } else {
                $image = $this->AdBannners->find('all')->where(['AdBannners.id' => $data['id']])->first();
                $banners->image = $image->image;
            }

            $bannerData = $this->AdBannners->save($banners);
            if (isset($data['id']) && !empty($data['id'])) {
                $this->Flash->success(__('Ad banner Update successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/ad_banner/' . $data['id']);
            } else {
                $this->Flash->success(__('Banner added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/ad_banner');
            }
        }




        $this->set(compact('bannerlisting', 'editRow', 'id', 'bannerimg', 'ad_id'));
    }

    public function getCode($id = null) {
        $scriptTag = '&lt;script type="text/javascript" src="' . HTTP_ROOT . 'ad?id=' . $id . '"&gt;&lt;/script&gt;';
        $iframe = '&lt;iframe src="' . HTTP_ROOT . 'ad?id=' . $id . '" width="100%" height="500"&gt;&lt;/iframe&gt';
        //$php = '<?php echo file_get_contents("https://www.phpkobo.com:443/mod/TAGAX/v3.07/demo/cn/rd.php?id=1110")';




        $this->set(compact('scriptTag', 'iframe'));
    }

    public function deleteBanner($id = null) {
        $this->autoRender = false;
        $entity = $this->Banners->get($id);
        $result = $this->Banners->delete($entity);
        $this->Flash->success(__('Banner is deleted.'));
        $this->redirect('/appadmins/viewBanner');
    }

    public function deleteSubBanner($id = null) {
        $this->autoRender = false;
        $entity = $this->Banners->get($id);

        $result = $this->Banners->delete($entity);
        $this->Flash->success(__('Banner is deleted.'));
        $this->redirect('/appadmins/subBanner/' . $entity['banner_id']);
    }

    public function subBanner($banner_id = null, $sub_banner_id = null) {
        $detailsBanner = $this->Banners->find('all')->where(['Banners.banner_id' => $banner_id]);

        if (isset($sub_banner_id) && !empty($sub_banner_id)) {
            $editsubBanner = $this->Banners->find('all')->where(['Banners.id' => $sub_banner_id])->first();
        }

        $banners = $this->Banners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data);exit;
            $data['banner_id'] = $data['banner_id'];
            $data['title'] = $data['title'];
            $data['description'] = $data['description'];
            $banners = $this->Banners->patchEntity($banners, $data);
            $banners->is_active = 1;


            if (!empty($data['image']['tmp_name'])) {
                $imageName = $this->Custom->uploadImageBanner($data['image']['tmp_name'], $data['image']['name'], BANNERS, 1820);
                $banners->image = $imageName;
            } else {
                $image = $this->Banners->find('all')->where(['Banners.id' => $data['id']])->first();
                $banners->image = $image->image;
            }

            $bannerData = $this->Banners->save($banners);
            if (isset($data['id']) && !empty($data['id'])) {
                $this->Flash->success(__('Banner Added successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/subBanner/' . $data['banner_id'] . '/' . $data['id']);
            } else {
                $this->Flash->success(__('Banner Updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/subBanner/' . $data['banner_id']);
            }
        }


        $this->set(compact('detailsBanner', 'banner_id', 'editsubBanner', 'sub_banner_id'));
    }

    public function setPassword($id = null) {
        $passwordData = $this->Users->newEntity();
        $setPassword = $this->Users->find('all')->where(['Users.id' => $id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $password = $data['password'];
            $conpassword = $data['cpassword'];
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $passwordData = $this->Users->patchEntity($passwordData, $data);
                $passwordData->id = $data['id'];

                if ($this->Users->save($passwordData)) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $setPassword->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $password = $password;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $this->Flash->success(__('Password set successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                }
            }
        }
        $this->set(compact('passwordData', 'setPassword'));
    }

    public function iconDelete($id = null) {
        $this->viewBuilder()->layout('admins');
        if ($id) {
            $list = $this->SocialMedia->find('all', ['Fields' => ['image']])->where(['SocialMedia.id' => $id])->first();
            unlink(SOCIAL_ICON . $list->image);
            $this->SocialMedia->updateAll(array('image' => ''), array('id' => $id));
            $this->redirect(HTTP_ROOT . 'appadmins/social_media/' . $id . '/SocialMedia');
        }
    }

    public function ajaxUpcomingNightsSet() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $id = $data['id'];
        $type = $data['type'];
        if ($id) {
            $this->Events->updateAll(array('is_featured' => $type), array('id' => $id));
            if ($type == 1) {
                $this->Events->updateAll(array('status' => 1), array('id' => $id));
            }
        }
        echo 1;
        exit;
    }

    public function padingReports() {
        $this->viewBuilder()->layout('admin');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            @$pending = $data['is_pending'];
            @$eventId = $data['event_id'];
            @$sechudelId = $data['sechudle_id'];
            if ($eventId && !$sechudelId) {
                $this->EventBookings->belongsTo('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_schedule_id']);
                if ($pending == 1) {
                    $ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['EventBookings.event_id' => $eventId])->order(['EventBookings.created' => 'DESC']);
                } else {
                    $ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['EventBookings.event_id' => $eventId, 'EventBookings.payment_status' => 1])->order(['EventBookings.created' => 'DESC']);
                }
            } else if ($eventId && $sechudelId) {
                $this->EventBookings->belongsTo('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_schedule_id']);
                if ($pending == 1) {
                    $ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['EventBookings.event_id' => $eventId, 'EventBookings.event_schedule_id' => $sechudelId])->order(['EventBookings.created' => 'DESC']);
                } else {
                    $ticketDetails = $this->EventBookings->find('all')->contain(['EventSchedules'])->where(['EventBookings.payment_status' => 1, 'EventBookings.event_id' => $eventId, 'EventBookings.event_schedule_id' => $sechudelId])->order(['EventBookings.created' => 'DESC']);
                }
            }
            $count = 0;
            foreach ($ticketDetails as $tkt) {
                $payments[$count]['ticket'] = $tkt->unique_id;
                $payments[$count]['name'] = $tkt->first_name . ' ' . $tkt->last_name;
                $payments[$count]['phone'] = $tkt->phone;
                $payments[$count]['purchase_date'] = date('d-m-Y', strtotime($tkt->created));
                $payments[$count]['qty'] = $tkt->ticket_no;
                $payments[$count]['total'] = number_format((float) $tkt->total_amount, 2, '.', '');
                $payments[$count]['mode'] = ($tkt->payment_mode == 1) ? "Online" : "Offiline";
                $payments[$count]['status'] = ($tkt->payment_status == 1) ? "Paid" : "Pending";
                $count++;
            }
            $fileName = strtotime(date('Y-m-d H:i:s'));
            $file_name = $this->Custom->downloadCustomerReport($payments, $fileName);
            header('location:' . HTTP_ROOT . EXCEL . $file_name);
            exit;
        }
    }

    public function paymentGateways() {
        $entity = $this->PaymentGetways->newEntity();
        $row = $this->PaymentGetways->find()->where(['PaymentGetways.id' => 1])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['checkbox3'] == 1) {
                $data['mode'] = 1;
            } else {
                $data['mode'] = 0;
            }
            $entity = $this->PaymentGetways->patchEntity($entity, $data);
            if ($this->PaymentGetways->save($entity)) {
                $this->Flash->success(__('payment information has been update successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/payment_gateways/');
            }
        }

        $this->set(compact('row'));
    }

    public function scenes($id = null) {

        if (isset($id)) {
            $editData = $this->Scenes->find('all')->where(['Scenes.id' => $id])->first();
            $set_model = $this->SetModel->find('all')->where(['scenes_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $scenes = $this->Scenes->newEntity();
            $data = $this->request->data;
            $data['is_active'] = 1;

            $scenes = $this->Scenes->patchEntity($scenes, $data);
            if ($this->Scenes->save($scenes)) {
                $xc = $scenes->id;
                if (isset($data['model_show'])) {
                    echo $data['model_show'];
                    $modeldata1 = $this->SetModel->newEntity();
                    $modeldata['scenes_id'] = $xc;
                    $modeldata['model_id'] = $data['model_show'];
                    if (isset($data['model_video'])) {
                        $modeldata['model_video'] = $data['model_video'];
                    } else {
                        $modeldata['model_video'] = "";
                    }
                    if (isset($data['model_image'])) {
                        $modeldata['model_image'] = implode(',', $data['model_image']);
                    } else {
                        $modeldata['model_image'] = "";
                    }

                    $modeldata1 = $this->SetModel->patchEntity($modeldata1, $modeldata);
                    $this->SetModel->deleteAll(['scenes_id' => $xc]);
                    $this->SetModel->save($modeldata1);
                }
                //SetModel

                if ($data['id']) {
                    $this->Flash->success(__('Scenes information has been update successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenes/' . $xc);
                } else {
                    $this->Flash->success(__('Scenes information has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenes/' . $xc);
                }
            }
        }

        $dataListings = $this->Scenes->find('all');
        $modelListings = $this->Models->find('all');
        $this->set(compact('id', 'dataListings', 'editData', 'modelListings', 'set_model'));
    }

    public function createModel($model_id = null) {

        if (isset($model_id)) {
            $editData = $this->Models->find('all')->where(['Models.id' => $model_id])->first();
        }


        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['gn_save'] == 1) {
                $dataSave = $this->Models->newEntity();
                pj($data);
                //$data['id'] = $data['id'];
                $data['scenes_id'] = 0;
                $data['model_name'] = $data['model_name'];
                $data['model_real_name'] = $data['model_real_name'];
                $data['model_about'] = $data['model_about'];
                $data['age'] = date_diff(date_create(date('Y-m-d', strtotime($data['birth_date']))), date_create('today'))->y;
                $data['dick_size'] = "";
                $data['birth_date '] = date('Y-m-d', strtotime($data['birth_date']));
                $data['hair'] = $data['hair'];
                $data['eyes'] = $data['eyes'];
                $data['height'] = $data['height'];
                $data['weight'] = $data['weight'];
                $data['gender'] = $data['gender'];
                $data['tits'] = $data['tits'];


//                if (!empty($data['mini_pic']['tmp_name'])) {
//                    $cover_pic = $this->Custom->simpleImageUpload($data['cov_pic']['tmp_name'], $data['cov_pic']['name'], PHOTOS, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
//                    $dataSave->cover_pic = $cover_pic;
//                }else{
//                    $dataSave->cover_pic = $editData->cover_pic;
//                }



                $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
                //pj($data);exit;
                $dataSave = $this->Models->patchEntity($dataSave, $data);
                if ($this->Models->save($dataSave)) {
                    if ($data['id']) {
                        $this->Flash->success(__('Model  information has been update successfully'));
                        $this->redirect(HTTP_ROOT . 'appadmins/create_model' . '/' . $data['id']);
                    } else {
                        $this->Flash->success(__('Model  information has been added successfully'));
                        $this->redirect(HTTP_ROOT . 'appadmins/create_model/');
                    }
                }
            }
        }
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
        $scene = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);
        $haircolor = $this->Color->find('list', ['keyField' => 'color', 'valueField' => 'color'])->where(['type' => 1]);
        $eyecolor = $this->Color->find('list', ['keyField' => 'color', 'valueField' => 'color'])->where(['type' => 2]);
        $dataListings = $this->Models->find('all');
        $this->set(compact('options', 'model_id', 'dataListings', 'editData', 'scene', 'haircolor', 'eyecolor'));
    }

    public function modelSetting($model_id = null) {
        $dataListings = $this->Models->find('all');
        $this->set(compact('dataListings'));
    }

    public function scenesList($model_id = null) {
        $dataListings = $this->Scenes->find('all');
        $modelListings = $this->Models->find('all');
        $this->set(compact('dataListings', 'modelListings'));
    }

    public function modelUrl($model_id = null) {
        if (empty($model_id)) {
            $getting_id = $this->Models->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/model_url/' . $getting_id->id);
        }
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
        $urls_lists = $this->ModelUrl->find('all')->where(['model_id' => $model_id])->order(['ModelUrl.id' => 'ASC']);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;
            foreach ($data['url'] as $url) {


                $dataSave = $this->ModelUrl->newEntity();
                $data['model_id'] = $data['model_id'];
                $data['url'] = $url;
                $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
                $dataSave = $this->ModelUrl->patchEntity($dataSave, $data);
                $res = $this->ModelUrl->save($dataSave);
            }
            if ($res) {


                $this->Flash->success(__('Model  information has been added successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/model_url/' . $data['model_id']);
            }
        }

        $this->set(compact('options', 'model_id', 'urls_lists'));
    }

//    public function createVideo($model_id = null, $video_id = null) {
//
//        if (isset($model_id)) {
//            $editDataModel = $this->Models->find('all')->where(['Models.id' => $model_id])->first();
//        }
//        if (isset($video_id)) {
//            $editData = $this->ModelVideos->find('all')->where(['ModelVideos.id' => $video_id])->first();
//        }
//
//        if ($this->request->is('post')) {
//            $data = $this->request->data;
//            //pj($data); exit;
//
//            if ($data['gn_save'] == 2) {
//                //pj($data); exit;
//                $dataSave = $this->ModelVideos->newEntity();
//                $data['scence_id'] =0;
//                $data['model_id'] = $data['model_id'];
//                $data['video_name '] = $data['video_name'];
//                $data['video_durations'] = $data['video_durations'];
//                $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
//                $data['video_quality'] = implode(",", $data['video_quality']);
//                $data['tags'] = $data['tags'];
//                if (isset($data['is_tailer']) && !empty($data['is_tailer'])) {
//                    $data['is_tailer'] = $data['is_tailer'];
//                } else {
//                    $data['is_tailer'] = "Is tailer";
//                }
//
//                $data['video_type'] = 0;
//                if (isset($data['video_filess']['tmp_name'])) {
//
//                    $path = VIDEOS . $data['model_id'] . '/';
//                    if (!file_exists($path)) {
//                        mkdir(VIDEOS . $data['model_id'], 777, true);
//                        chmod(VIDEOS . $data['model_id'], 0777);
//                    }
//                    $videoFiles = $this->Custom->uploadFile($data['video_filess']['tmp_name'], $data['video_filess']['name'], $path, array('mp4'));
//                    $data['video_file'] = $videoFiles['message'];
//                }
//                // pj($data); exit;
//                $dataSave = $this->ModelVideos->patchEntity($dataSave, $data);
//                if ($this->ModelVideos->save($dataSave)) {
//                    if ($data['id']) {
//                        $this->Flash->success(__('Video update successsfully'));
//                        $this->redirect(HTTP_ROOT . 'appadmins/create_video/' .  $data['model_id'] );
//                    } else {
//                        $this->Flash->success(__('Video add successsfully  information has been added successfully'));
//                        $this->redirect(HTTP_ROOT . 'appadmins/create_video/' .  $data['model_id']);
//                    }
//                }
//            }
//        }
//        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
//
//        $dataListings = $this->ModelVideos->find('all')->where(['ModelVideos.model_id' => $model_id]);
//        //pj($dataListings); 
//        $this->set(compact( 'options', 'model_id', 'video_id', 'dataListings', 'editData', 'editDataModel'));
//    }

    public function scenesphotoGallery($id = null) {
        if (empty($id)) {
            $getting_id = $this->Scenes->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/scenesphoto_gallery/' . $getting_id->id);
        }
        if (isset($id)) {
            $editData = $this->Scenes->find('all')->where(['Scenes.id' => $id])->first();
        }
        
        /** WaterMark image  Start **/
        $wat_pic = $this->WatermarkSettings->find('all')->where(['WatermarkSettings.id' => 1])->first();
        if($wat_pic->is_active == 1){
        $w_mk =HTTP_ROOT.WATERMARK. $wat_pic->water_mark_image;
        }
        $watermark = imagecreatefrompng($w_mk);
        
        $water_width = imagesx($watermark);
        $water_height = imagesy($watermark);
        /** WaterMark image  End **/
        
        
        $nom= $this->ScenesPhotos->find('all')->where(['scene_id'=>$id])->order(['id'=>'DESC'])->first();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;scenes_photos
            $fnm = "";

            $nofile = count($data['photo_filess']);
            for ($xi = 0; $xi < $nofile; $xi++) {

                $dataSave = $this->ScenesPhotos->newEntity();
                $data['scene_id'] = $data['scenes_id'];
                $data['release_date'] = "";
                $data['gal_name'] = $data['gal_name'];

                //pr($data['photo_filess'][$xi]);
                if (isset($data['photo_filess'][$xi]['tmp_name'])) {
                    //echo "hhi"; exit;
                    $path = PHOTOS . 'scenes/' . $data['scenes_id'] . '/' . $data['gal_name'] . '/';

                    $extname = explode(".", $data['photo_filess'][$xi]['name'])[1];
                    $videoFiles = $customname = SITE_NAME ."-".$data['scenes_id'].'-'.++$nom->id . '.' . $extname;
                    
                    move_uploaded_file($data['photo_filess'][$xi]['tmp_name'], $path  . $customname);
                    
                    $uploadimage=$path.$customname;
  
                    // Set the thumbnail name
                    $thumbnail = $path.$customname;
                    $actual = $path.$customname;
                    $imgname= $path.$customname;
                    $source = imagecreatefromjpeg($uploadimage);
                    
                    
                    
                    $main_width = imagesx($source);
                    $main_height = imagesy($source);
                    
                    if($wat_pic->postions_type==2){
                        if($wat_pic->postions_labels == 1){
                            // top-right
                            $dime_x = $main_width - $water_width;  
                            $dime_y = 5;
                        }else if($wat_pic->postions_labels == 2){
                            // top-left
                            $dime_x = 5;  
                            $dime_y = 5;
                        }else if($wat_pic->postions_labels == 3){
                            // bottom-left
                            $dime_x = 5;  
                            $dime_y = $main_height - ($water_height+5);
                        }else if($wat_pic->postions_labels == 4){
                            // bottom-right
                            $dime_x = $main_width - ($water_width+5);  
                            $dime_y = $main_height - ($water_height+5);
                        }else if($wat_pic->postions_labels == 5){
                            // center
                            $dime_x = ($main_width - $water_width)/2;  
                            $dime_y = ($main_height - $water_height)/2;
                        }else{
                            $dime_x = 5;  
                            $dime_y = 5;
                        }
                    }else if($wat_pic->postions_type==1){
                            $dime_y = $wat_pic->postions_top;  
                            $dime_x = $wat_pic->postions_bottom;
                    }else{
                        $dime_x = 0;  
                        $dime_y = 0;
                    }
                    
                                
                    imagecolorallocate($source, 125, 125, 125);
                    
                    imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);
                    
                    if($extname=='jpg' || $extname=='JPG' || $extname=='jpeg' || $extname=='JPEG'){
                        imagejpeg($source, $thumbnail, 100);
                    }else if($extname=='png' || $extname=='PNG'){
                        imagepng($source, $thumbnail, 100);
                    }else{
                        imagejpeg($source, $thumbnail, 100);
                    }

                    //$this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'thumb_' . $customname, 200, 200, 1);
                    //$this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'large_' . $customname, 900, 900, 1);
                    $fnm .= $videoFiles . ',';
                    $data['files_name'] = $videoFiles;
                    $dataSave = $this->ScenesPhotos->patchEntity($dataSave, $data);
                    $this->ScenesPhotos->save($dataSave);
                }
            }

            $this->Flash->success(__('Scene photo has been added successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/scenesphoto_gallery/' . $data['scenes_id']);
        }

        $options = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);

        $options_gallery = $this->ScenesPhotoGallery->find('list', ['keyField' => 'name', 'valueField' => 'name'])->where(['scenes_id' => $id, 'type' => 1]);
        $options_gallery_count = $this->ScenesPhotoGallery->find('list', ['keyField' => 'name', 'valueField' => 'name'])->where(['scenes_id' => $id, 'type' => 1])->count();
        $photo_gallery = $this->ScenesPhotoGallery->find('all')->where(['scenes_id' => $id, 'type' => 1])->order(['ScenesPhotoGallery.sort_order' => 'ASC']);

        $this->set(compact('getting_id', 'editData', 'options', 'id', 'options_gallery', 'options_gallery_count', 'photo_gallery'));
    }

    public function modelGalleryPic() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->ModelPhotos->newEntity();
            $data['model_id '] = $data['model_id'];
            $data['release_date'] = "";
            $data['is_active'] = 1;
            $data['gal_name'] = $data['gal_name'];

            if (isset($data['myfile']['tmp_name'])) {

                $path = PHOTOS . $data['model_id'] . '/';
                if (!file_exists($path)) {
                    mkdir(PHOTOS . $data['model_id'], 777, true);
                    chmod(PHOTOS . $data['model_id'], 0777);
                }
                $path = $path . $data['gal_name'] . '/';

                $extname = explode(".", $data['myfile']['name'])[1];
                $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                if (move_uploaded_file($data['myfile']['tmp_name'], $path . "main_" . $customname)) {
                    $this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'thumb_' . $customname, 200, 200, 1);
                    $this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'large_' . $customname, 900, 900, 1);
                    $fnm .= $videoFiles . ',';
                    $data['files_name'] = $videoFiles;
                    $dataSave = $this->ModelPhotos->patchEntity($dataSave, $data);
                    $this->ModelPhotos->save($dataSave);
                    echo "File uploaded successfully!!";
                } else {
                    echo "failed";
                }
            } else {
                echo "Please select a file..!";
            }
        }

        exit;
    }

    public function createPhoto($model_id = null) {
        if (empty($model_id)) {
            $getting_id = $this->Models->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/create_photo/' . $getting_id->id);
        }
        if (isset($model_id)) {
            $editData = $this->Models->find('all')->where(['Models.id' => $model_id])->first();
        }
        
        /** WaterMark image  Start **/
        $wat_pic = $this->WatermarkSettings->find('all')->where(['WatermarkSettings.id' => 1])->first();
        if($wat_pic->is_active == 1){
        $w_mk =HTTP_ROOT.WATERMARK. $wat_pic->water_mark_image;
        }
        $watermark = imagecreatefrompng($w_mk);
        
        $water_width = imagesx($watermark);
        $water_height = imagesy($watermark);
        /** WaterMark image  End **/
        
        
        $nom= $this->ModelPhotos->find('all')->where(['model_id'=>$model_id])->order(['id'=>'DESC'])->first();
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;
            
           
            $fnm = "";

            $nofile = count($data['photo_filess']);
            for ($xi = 0; $xi < $nofile; $xi++) {

                $dataSave = $this->ModelPhotos->newEntity();
                $data['scene_id'] = 0;
                $data['model_id '] = $data['model_id'];
                $data['release_date'] = "";
                $data['is_active'] = 1;
                $data['gal_name'] = $data['gal_name'];


                if (isset($data['photo_filess'][$xi]['tmp_name'])) {

                    $path = PHOTOS . $data['model_id'] . '/';

                    if (!file_exists($path)) {
                        mkdir(PHOTOS . $data['model_id'], 777, true);
                        chmod(PHOTOS . $data['model_id'], 0777);
                    }
                    $path = $path . $data['gal_name'] . '/';
                    $extname = explode(".", $data['photo_filess'][$xi]['name'])[1];
                    $videoFiles = $customname = SITE_NAME."-".$data['model_id'].'-'.++$nom->id . '.' . $extname;
                    
                    
                    
                    move_uploaded_file($data['photo_filess'][$xi]['tmp_name'], $path . $customname);
                    
                    $uploadimage=$path.$customname;
  
                    // Set the thumbnail name
                    $thumbnail = $path.$customname;
                    $actual = $path.$customname;
                    $imgname= $path.$customname;
                    $source = imagecreatefromjpeg($uploadimage);
                    
                    
                    
                    $main_width = imagesx($source);
                    $main_height = imagesy($source);
                    
                    if($wat_pic->postions_type==2){
                        if($wat_pic->postions_labels == 1){
                            // top-right
                            $dime_x = $main_width - $water_width;  
                            $dime_y = 5;
                        }else if($wat_pic->postions_labels == 2){
                            // top-left
                            $dime_x = 5;  
                            $dime_y = 5;
                        }else if($wat_pic->postions_labels == 3){
                            // bottom-left
                            $dime_x = 5;  
                            $dime_y = $main_height - ($water_height+5);
                        }else if($wat_pic->postions_labels == 4){
                            // bottom-right
                            $dime_x = $main_width - ($water_width+5);  
                            $dime_y = $main_height - ($water_height+5);
                        }else if($wat_pic->postions_labels == 5){
                            // center
                            $dime_x = ($main_width - $water_width)/2;  
                            $dime_y = ($main_height - $water_height)/2;
                        }else{
                            $dime_x = 5;  
                            $dime_y = 5;
                        }
                    }else if($wat_pic->postions_type==1){
                            $dime_y = $wat_pic->postions_top;  
                            $dime_x = $wat_pic->postions_bottom;
                    }else{
                        $dime_x = 0;  
                        $dime_y = 0;
                    }
                    
                                
                    imagecolorallocate($source, 125, 125, 125);
                    
                    imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);
                    
                    if($extname=='jpg' || $extname=='JPG' || $extname=='jpeg' || $extname=='JPEG'){
                        imagejpeg($source, $thumbnail, 100);
                    }else if($extname=='png' || $extname=='PNG'){
                        imagepng($source, $thumbnail, 100);
                    }else{
                        imagejpeg($source, $thumbnail, 100);
                    }
                    

                    //$this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'thumb_' . $customname, 200, 200, 1);
                    //$this->Custom->GenerateThumbnail($path . "main_" . $customname, $path . 'large_' . $customname, 900, 900, 1);
                    $fnm .= $videoFiles . ',';
                    $data['files_name'] = $videoFiles;
                    $dataSave = $this->ModelPhotos->patchEntity($dataSave, $data);
                    $this->ModelPhotos->save($dataSave);
                }
            }

            $this->Flash->success(__('Model photo  has been added successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/create_photo/' . $data['model_id']);
            //single file upload
            /*  if (isset($data['photo_filess']['tmp_name'])) {
              //echo "hhi"; exit;
              $path = PHOTOS . $data['model_id'] . '/';
              //echo "hhi"; exit;
              if (!file_exists($path)) {
              mkdir(PHOTOS . $data['model_id'], 777, true);
              chmod(PHOTOS . $data['model_id'], 0777);
              }
              $videoFiles = $this->Custom->uploadImage($data['photo_filess']['tmp_name'], $data['photo_filess']['name'], $path.$data['gal_name'].'/', $path.$data['gal_name'].'/',$path.$data['gal_name'].'/');
              $data['files_name'] = $videoFiles;
              } */

//                if () {
//                    $this->Flash->success(__('Model photo  has been added successfully'));
//                    $this->redirect(HTTP_ROOT . 'appadmins/create_photo/' .  $data['model_id']);
//                }
        }
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
        $options_gallery = $this->PhotoGallery->find('list', ['keyField' => 'name', 'valueField' => 'name'])->where(['model_id' => $model_id, 'type' => 1]);
        $options_gallery_count = $this->PhotoGallery->find('list', ['keyField' => 'name', 'valueField' => 'name'])->where(['model_id' => $model_id, 'type' => 1])->count();
        $photo_gallery = $this->PhotoGallery->find('all')->where(['model_id' => $model_id, 'type' => 1])->order(['PhotoGallery.sort_order' => 'ASC']);

        $this->set(compact('options', 'model_id', 'editData', 'options_gallery', 'options_gallery_count', 'photo_gallery'));
    }

    public function managemodelPhotos($id = null, $arg2 = null) {
        $dataListings = $this->ModelPhotos->find('all')->where(['ModelPhotos.model_id' => $id, 'gal_name' => $arg2])->order(['ModelPhotos.sort_order' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'arg2'));
    }

    public function managemscenesPhotos($id = null, $arg2 = null) {
        $dataListings = $this->ScenesPhotos->find('all')->where(['ScenesPhotos.scene_id' => $id, 'ScenesPhotos.gal_name' => $arg2])->order(['ScenesPhotos.sort_order' => 'ASC']);
        $this->set(compact('dataListings', 'id', 'arg2'));
    }

    public function createGallary() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['model_id'] = $data['model_id'];
            $data['name'] = $data['name'];
            $data['releasedate'] = date('Y-m-d', strtotime($data['release_date']));

            $path = PHOTOS . $data['model_id'] . '/';
            if (!file_exists($path)) {
                mkdir(PHOTOS . $data['model_id'], 777, true);
                chmod(PHOTOS . $data['model_id'], 0777);
            }
            $gall_path = PHOTOS . $data['model_id'] . '/' . $data['name'];
            if (!file_exists($gall_path)) {
                mkdir(PHOTOS . $data['model_id'] . '/' . $data['name'], 777, true);
                chmod(PHOTOS . $data['model_id'] . '/' . $data['name'], 0777);
                $dataSave = $this->PhotoGallery->newEntity();
                $data['type'] = 1;
                $dataSave = $this->PhotoGallery->patchEntity($dataSave, $data);
                $this->PhotoGallery->save($dataSave);

                echo json_encode(array('status' => 'success', 'msg' => 'Gallery Created Successfully.'));
                exit;
            } elseif (file_exists($gall_path)) {
                echo json_encode(array('status' => 'error', 'msg' => 'Gallery already exits.'));
                exit;
            }
        }
        exit();
    }

    public function createscenesGallary() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['scenes_id'] = $data['scenes_id'];
            $data['name'] = $data['name'];
            $data['releasedate'] = date('Y-m-d', strtotime($data['release_date']));

            $path = PHOTOS . 'scenes/' . $data['scenes_id'] . '/';
            if (!file_exists($path)) {
                mkdir(PHOTOS . 'scenes/' . $data['scenes_id'], 777, true);
                chmod(PHOTOS . 'scenes/' . $data['scenes_id'], 0777);
            }
            $gall_path = PHOTOS . 'scenes/' . $data['scenes_id'] . '/' . $data['name'];
            if (!file_exists($gall_path)) {
                mkdir(PHOTOS . 'scenes/' . $data['scenes_id'] . '/' . $data['name'], 777, true);
                chmod(PHOTOS . 'scenes/' . $data['scenes_id'] . '/' . $data['name'], 0777);
                $dataSave = $this->ScenesPhotoGallery->newEntity();
                $data['type'] = 1;
                $dataSave = $this->ScenesPhotoGallery->patchEntity($dataSave, $data);
                $this->ScenesPhotoGallery->save($dataSave);

                echo json_encode(array('status' => 'success', 'msg' => 'Gallery Created Successfully.'));
                exit;
            } elseif (file_exists($gall_path)) {
                echo json_encode(array('status' => 'error', 'msg' => 'Gallery already exits.'));
                exit;
            }
        }
        exit();
    }

    public function mainPhoto($id = null, $table = null) {
        $active_column = 'pro_pic';
        $data = $this->$table->get($id);

        $this->$table->updateAll([$active_column => 0], ['model_id' => $data->model_id]);

        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {

            $this->Flash->success(__('Main picture has been set.'));
            $this->redirect($this->referer());
        }
    }

    public function scenemainPhoto($id = null, $table = null) {
        $active_column = 'pro_pic';
        $data = $this->$table->get($id);

        $this->$table->updateAll([$active_column => 0], ['scene_id' => $data->scene_id]);

        if ($this->$table->query()->update()->set([$active_column => 1])->where(['id' => $id])->execute()) {

            $this->Flash->success(__('Main picture has been set.'));
            $this->redirect($this->referer());
        }
    }

    public function modelBanner($model_id = null) {

        if (empty($model_id)) {
            $getting_id = $this->Models->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/model_banner/' . $getting_id->id);
        }

        if (isset($model_id)) {
            $editData = $this->Models->find('all')->where(['Models.id' => $model_id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;
            if ($data['photo_save'] == 4) {
                $dataSave = $this->ModelBanners->newEntity();
                //$data['id'] = $data['id'];

                $data['model_id '] = $data['model_id'];
                $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
                // pj($data); exit;
                if (isset($data['photo_filess']['tmp_name'])) {
                    //echo "hhi"; exit;
                    $path = PHOTOS . $data['model_id'] . '/';
                    //echo "hhi"; exit;
                    if (!file_exists($path)) {
                        mkdir(PHOTOS . $data['model_id'], 777, true);
                        chmod(PHOTOS . $data['model_id'], 0777);
                    }
                    $videoFiles = $this->Custom->uploadImage($data['photo_filess']['tmp_name'], $data['photo_filess']['name'], $path, $path, $path);
                    $data['files_name'] = $videoFiles;
                }
                $dataSave = $this->ModelBanners->patchEntity($dataSave, $data);
                if ($this->ModelBanners->save($dataSave)) {
                    $this->Flash->success(__('Model photo  has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/model_banner/' . $data['model_id']);
                }
            }
        }
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
        $dataListings = $this->ModelBanners->find('all')->where(['ModelBanners.model_id' => $model_id])->order(['ModelBanners.sort_order' => 'ASC']);
        $this->set(compact('options', 'model_id', 'dataListings', 'editData'));
    }

    public function modelBannerOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->ModelBanners->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function subbannerOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->Banners->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function modelphotoOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->ModelPhotos->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function scenesphotoOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->ScenesPhotos->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function modelgallOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->PhotoGallery->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function scenesgallOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->ScenesPhotoGallery->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function bannerOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->Banners->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function modelOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        pj($array);
        foreach ($array as $idval) {

            $this->Models->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function scenseOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->SetModel->updateAll(['sort_order' => $count], ['scenes_id' => $idval]);
            $this->Scenes->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function createMembership($id = null) {

        if (isset($id)) {
            $editData = $this->Memberships->find('all')->where(['Memberships.id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $scenes = $this->Memberships->newEntity();
            $data = $this->request->data;
            $data['is_active'] = 1;
            //pj($data);
            $scenes = $this->Memberships->patchEntity($scenes, $data);
            if ($this->Memberships->save($scenes)) {

                if ($data['id']) {
                    $this->Flash->success(__('Membships information has been update successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/create_membership/' . $data['id']);
                } else {
                    $this->Flash->success(__('Membships information has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/create_membership');
                }
            }
        }

        $dataListings = $this->Memberships->find('all');
        $this->set(compact('id', 'dataListings', 'editData'));
    }

    public function settingBanner() {
        $data = $this->Bannersettings->find('all')->first();

        if ($this->request->is('post')) {
            $datas = $this->request->data;
            //pj($datas);
            $ss = $this->Bannersettings->updateAll(['autowidth' => $datas['autowidth'], 'slidemove' => $datas['slidemove'], 'slidemargin' => $datas['slidemargin'], 'speed' => $datas['speed'], 'autoplay' => $datas['autoplay'], 'loopplay' => $datas['loopplay']], ['id' => 1]);

            if ($ss) {
                $this->Flash->success(__('Banner Setting has been update successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/setting_banner/' . $data['id']);
            }
        }
        $this->set(compact('data'));
    }

    public function socialMedia($id = null) {
        $dataEntity = $this->SocialMedia->newEntity();
        if (@$id) {
            $dataEdit = $this->SocialMedia->find('all')->where(['SocialMedia.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->SocialMedia->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->SocialMedia->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/social_media');
        }
        $dataListings = $this->SocialMedia->find('all')->order(['SocialMedia.sort_order']);
        $this->set(compact('dataEdit', 'id', 'dataEntity', 'dataListings'));
    }

    public function socialmediaOrder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        foreach ($array as $idval) {
            $this->SocialMedia->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function iconWebDelete($id = null) {
        $this->viewBuilder()->layout('admins');
        if ($id) {
            $list = $this->WebsiteIcon->find('all', ['Fields' => ['image']])->where(['WebsiteIcon.id' => $id])->first();
            unlink(WEBSITE_ICON . $list->image);
            $this->WebsiteIcon->updateAll(array('image' => ''), array('id' => $id));
            $this->redirect(HTTP_ROOT . 'appadmins/website_icon/' . $id . '/WebsiteIcon');
        }
    }

    public function websiteIcon($id = null) {

        $dataEntity = $this->WebsiteIcon->newEntity();

        if (@$id) {
            $dataEdit = $this->WebsiteIcon->find('all')->where(['WebsiteIcon.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data); exit;
            $data['icon_code'] = $data['icon_code'];
            $data['border_color'] = $data['border_color'];
            $data['back_ground_color'] = $data['id'];
            $data['back_ground_color'] = $data['id'];
            $dataEntity = $this->WebsiteIcon->patchEntity($dataEntity, $data);
            $dataEntity->is_active = 1;
            $this->WebsiteIcon->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/website_icon');
        }
        $webListings = $this->WebsiteIcon->find('all');
        $this->set(compact('id', 'webListings', 'dataEdit'));
    }

    public function modelalldata($id = null) {
        $this->viewBuilder()->layout('');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data);
            $model_id = $data['model_id'];
            $scenes_id = $data['scenes_id'];
            $set_model = $this->SetModel->find('all')->where(['model_id' => $model_id, 'scenes_id' => $scenes_id])->first();
            $model_details = $this->Models->find('all')->where(['id' => $model_id])->first();
            $model_video = $this->ModelVideos->find('all')->where(['model_id' => $model_id, 'is_tailer' => 'Is tailer', 'is_active' => 1]);
            $model_video_count = $this->ModelVideos->find('all')->where(['model_id' => $model_id, 'is_tailer' => 'Is tailer', 'is_active' => 1])->count();
            $model_photo = $this->ModelPhotos->find('all')->where(['model_id' => $model_id, 'is_active' => 1]);
            $model_photo_count = $this->ModelPhotos->find('all')->where(['model_id' => $model_id, 'is_active' => 1])->count();
            $model_url = $this->ModelUrl->find('all')->where(['model_id' => $model_id])->count();
        }
        $this->set(compact('model_id', 'model_details', 'model_video', 'model_photo', 'model_video_count', 'model_photo_count', 'set_model'));
    }

    public function generalSetting($id = null) {
        $dataListings = $this->GeneralSettings->find('all')->where(['id' => 1])->first();

        $dataEntity = $this->GeneralSettings->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            if ($data['download']) {
                $data['download'] = 1;
            } else {
                $data['download'] = 0;
            }
            
            if ($data['download_video']) {
                $data['download_video'] = 1;
            } else {
                $data['download_video'] = 0;
            }
            
            
            $dataEntity = $this->GeneralSettings->patchEntity($dataEntity, $data);
            if (!empty($data['logo']['tmp_name'])) {
                $imageName = $this->Custom->uploadImageBanner($data['logo']['tmp_name'], $data['logo']['name'], SOCIAL_ICON, array('png', 'PNG'));
                $dataEntity->logo = $imageName;
            } else {
                $dataEntity->logo = $dataListings->logo;
            }

            if (!empty($data['icon']['tmp_name'])) {
                $imageName = $this->Custom->simpleImageUpload($data['icon']['tmp_name'], $data['icon']['name'], SOCIAL_ICON, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
                $dataEntity->icon = $imageName;
            } else {
                $dataEntity->icon = $dataListings->icon;
            }
//            pj($dataEntity);
//            exit;
            $this->GeneralSettings->save($dataEntity);
            $this->Flash->success(__('Data has been add successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/general_setting');
        }

        $this->set(compact('dataEdit', 'id', 'dataEntity', 'dataListings'));
    }

    public function skincolor() {
        $dataEntity = $this->Skincolor->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (isset($data['bg_color'])) {
                $this->Skincolor->updateAll(['bg_color' => $data['bg_color']], ['id' => 1]);
            }
            if (isset($data['text_color'])) {
                $this->Skincolor->updateAll(['text_color' => $data['text_color']], ['id' => 1]);
            }
            if (isset($data['hovor_color'])) {
                $this->Skincolor->updateAll(['hovor_color' => $data['hovor_color']], ['id' => 1]);
            }

//            $dataEntity = $this->Skincolor->patchEntity($dataEntity, $data);
//             $dataEntity->id=1;
//            $this->Skincolor->save($dataEntity);
        }
        exit();
    }

    public function scenetrailerVideo($id = null, $video_id = null) {
        if (empty($id)) {
            $data = $this->Scenes->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/scenetrailer_video/' . $data['id']);
        }

        if (isset($video_id)) {
            $editData = $this->ScenesVideos->find('all')->where(['id' => $video_id, 'scene_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pj($data); exit;   
            $dataSave = $this->ScenesVideos->newEntity();

            $data['scene_id'] = $data['scene_id'];
            if(!empty($data['video_filess']['name'])){
                $data['video_name'] = $data['video_filess']['name'];
            }
            

            //$data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
            $data['video_quality'] =  $data['video_quality'];
            $data['tags'] = $data['tags'];
            $data['is_active'] = 1;

            $data['is_tailer'] = "Is tailer";

            $data['video_type'] = 0;
            if (isset($data['video_filess']['tmp_name'])) {

                $path = VIDEOS . $data['scene_id'] . '/';
                if (!file_exists($path)) {
                    mkdir(VIDEOS . $data['scene_id'], 777, true);
                    chmod(VIDEOS . $data['scene_id'], 0777);
                }
                $videoFiles = $this->Custom->uploadFile($data['video_filess']['tmp_name'], $data['video_filess']['name'], $path, array('mp4'));
                if ($videoFiles['status'] == "error") {
                    $data['video_file'] = $editData->video_file;
                } else {
                    if (isset($editData) && $editData->video_file) {
                        unlink($path . $editData->video_file);
                    }
                    $data['video_file'] = $videoFiles['message'];

                    $getID3 = new \getID3();
                    $filename = $path . $videoFiles['message'];
                    $fileinfo = $getID3->analyze($filename);

                    $width = $fileinfo['video']['resolution_x'];
                    $height = $fileinfo['video']['resolution_y'];

                    //echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];
                    $data['video_durations'] = $fileinfo['playtime_string'];
                }
            }
            //pj($data['video_file']); exit;
            $dataSave = $this->ScenesVideos->patchEntity($dataSave, $data);
            if ($this->ScenesVideos->save($dataSave)) {
                if (isset($editData->id)) {
                    $this->Flash->success(__('Video information has been Updated successsfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenetrailer_video/' . $data['scene_id'] . '/' . $editData->id);
                } else {
                    $this->Flash->success(__('Video information has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenetrailer_video/' . $data['scene_id']);
                }
            }
        }
        $options = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);
        $dataListings = $this->ScenesVideos->find('all')->where(['ScenesVideos.scene_id' => $id, 'is_tailer' => 'Is tailer']);
        $this->set(compact('options', 'id', 'video_id', 'dataListings', 'editData'));
    }

    public function scenemainVideo($id = null, $video_id = null) {
        if (empty($id)) {
            $data = $this->Scenes->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/scenemain_video/' . $data['id']);
        }

        if (isset($video_id)) {
            $editData = $this->ScenesVideos->find('all')->where(['id' => $video_id, 'scene_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            // print_r($data); //exit;  

            $dataSave = $this->ScenesVideos->newEntity();

            $data['scene_id'] = $data['scene_id'];
            if(!empty($data['video_filess']['name'])){
                $data['video_name'] = $data['video_filess']['name'];
            }

            $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
            $data['video_quality'] = $data['video_quality'];
            $data['tags'] = $data['tags'];
            $data['is_active'] = 1;

            $data['is_tailer'] = "Is main";

            $data['video_type'] = 0;
            if (isset($data['video_filess']['tmp_name'])) {

                $path = VIDEOS . $data['scene_id'] . '/';
                if (!file_exists($path)) {
                    mkdir(VIDEOS . $data['scene_id'], 777, true);
                    chmod(VIDEOS . $data['scene_id'], 0777);
                }
                $videoFiles = $this->Custom->uploadFile($data['video_filess']['tmp_name'], $data['video_filess']['name'], $path, array('mp4'));
                if ($videoFiles['status'] == "error") {
                    $data['video_file'] = $editData->video_file;
                } else {
                    if (isset($editData) && $editData->video_file) {
                        unlink($path . $editData->video_file);
                    }
                    $data['video_file'] = $videoFiles['message'];

                    $getID3 = new \getID3();
                    $filename = $path . $videoFiles['message'];
                    $fileinfo = $getID3->analyze($filename);

                    $width = $fileinfo['video']['resolution_x'];
                    $height = $fileinfo['video']['resolution_y'];

                    //echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];
                    $data['video_durations'] = $fileinfo['playtime_string'];
                    // exit;
                }
            }

            //pj($data['video_file']); exit;
            $dataSave = $this->ScenesVideos->patchEntity($dataSave, $data);
            if ($this->ScenesVideos->save($dataSave)) {
                if (isset($editData->id)) {
                    $this->Flash->success(__('Video information has been Updated successsfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenemain_video/' . $data['scene_id'] . '/' . $editData->id);
                } else {
                    $this->Flash->success(__('Video information has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenemain_video/' . $data['scene_id']);
                }
            }
        }
        $options = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);
        $dataListings = $this->ScenesVideos->find('all')->where(['ScenesVideos.scene_id' => $id, 'is_tailer' => 'Is main']);
        $this->set(compact('options', 'id', 'video_id', 'dataListings', 'editData'));
    }

    public function scenebonusVideo($id = null, $video_id = null) {
        if (empty($id)) {
            $data = $this->Scenes->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/scenebonus_video/' . $data['id']);
        }

        if (isset($video_id)) {
            $editData = $this->ScenesVideos->find('all')->where(['id' => $video_id, 'scene_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pj($data); exit;   
            $dataSave = $this->ScenesVideos->newEntity();

            $data['scene_id'] = $data['scene_id'];
            if(!empty($data['video_filess']['name'])){
                $data['video_name'] = $data['video_filess']['name'];
            }

            $data['release_date'] = date('Y-m-d', strtotime($data['release_date']));
            $data['video_quality'] =  $data['video_quality'];
            $data['tags'] = $data['tags'];
            $data['is_active'] = 1;

            $data['is_tailer'] = "Is bonus";

            $data['video_type'] = 0;
            if (isset($data['video_filess']['tmp_name'])) {

                $path = VIDEOS . $data['scene_id'] . '/';
                if (!file_exists($path)) {
                    mkdir(VIDEOS . $data['scene_id'], 777, true);
                    chmod(VIDEOS . $data['scene_id'], 0777);
                }
                $videoFiles = $this->Custom->uploadFile($data['video_filess']['tmp_name'], $data['video_filess']['name'], $path, array('mp4'));
                if ($videoFiles['status'] == "error") {
                    $data['video_file'] = $editData->video_file;
                } else {
                    if (isset($editData) && $editData->video_file) {
                        unlink($path . $editData->video_file);
                    }
                    $data['video_file'] = $videoFiles['message'];

                    $getID3 = new \getID3();
                    $filename = $path . $videoFiles['message'];
                    $fileinfo = $getID3->analyze($filename);

                    $width = $fileinfo['video']['resolution_x'];
                    $height = $fileinfo['video']['resolution_y'];

                    //echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];
                    $data['video_durations'] = $fileinfo['playtime_string'];
                }
            }
            //pj($data['video_file']); exit;
            $dataSave = $this->ScenesVideos->patchEntity($dataSave, $data);
            if ($this->ScenesVideos->save($dataSave)) {
                if (isset($editData->id)) {
                    $this->Flash->success(__('Video information has been Updated successsfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenebonus_video/' . $data['scene_id'] . '/' . $editData->id);
                } else {
                    $this->Flash->success(__('Video information has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/scenebonus_video/' . $data['scene_id']);
                }
            }
        }
        $options = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);
        $dataListings = $this->ScenesVideos->find('all')->where(['ScenesVideos.scene_id' => $id, 'is_tailer' => 'Is bonus']);
        $this->set(compact('options', 'id', 'video_id', 'dataListings', 'editData'));
    }

    public function modelFooterWidgets() {
        
    }

    public function paymentWidgets() {
        $datas = $this->PaymentWidget->find('all')->first();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->PaymentWidget->newEntity();
            $data['id'] = 1;


            $dataSave = $this->PaymentWidget->patchEntity($dataSave, $data);
            if ($this->PaymentWidget->save($dataSave)) {
                $this->Flash->success(__('information has been updated successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/payment_widgets/');
            }

            if (isset($data['text_color'])) {
                $this->PaymentWidget->updateAll(['text_color' => $data['text_color']], ['id' => 1]);
            }
            if (isset($data['inner_color'])) {
                $this->PaymentWidget->updateAll(['inner_color' => $data['inner_color']], ['id' => 1]);
            }
            if (isset($data['border_color'])) {
                $this->PaymentWidget->updateAll(['border_color' => $data['border_color']], ['id' => 1]);
            }
        }
        $this->set(compact('datas'));
    }

    public function homeCms() {
        $editData = $this->HomeCms->find('all')->where(['id' => 1])->first();
        if ($this->request->is('post')) {
            $content = $this->HomeCms->newEntity();
            $data = $this->request->data();

            $data['id'] = 1;
            $content = $this->HomeCms->patchEntity($content, $data);
            if ($this->HomeCms->save($content)) {
                $this->Flash->success(__('information has been updated successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/home_cms/');
            }
        }
        $this->set(compact('editData'));
    }

    public function leftBanner() {
        $datas = $this->CommericalBanners->find('all')->where(['CommericalBanners.type' => 1]);
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->CommericalBanners->newEntity();
            $imageName = $this->Custom->simpleImageUpload($data['image']['tmp_name'], $data['image']['name'], AD_BANNERS, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
            $data['image'] = $imageName;
            $data['model_id'] = $data['model_id'];
            $data['banner_name '] = 'Left banner';
            $data['type'] = 1;
            $data['is_active'] = 1;
            $data['created'] = date('Y-m-d H:i:s');
            //simpleImageUpload
            $dataSave = $this->CommericalBanners->patchEntity($dataSave, $data);
            if ($this->CommericalBanners->save($dataSave)) {
                $this->Flash->success(__('ad banner has been added successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/left_banner/');
            }
        }
        $this->set(compact('datas', 'options'));
    }

    public function middleBanner() {
        $datas = $this->CommericalBanners->find('all')->where(['CommericalBanners.type' => 2]);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->CommericalBanners->newEntity();
            $imageName = $this->Custom->simpleImageUpload($data['image']['tmp_name'], $data['image']['name'], AD_BANNERS, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
            $data['image'] = $imageName;
            $data['banner_name '] = 'Middle banner';
            $data['type'] = 2;
            $data['is_active'] = 1;
            $data['created'] = date('Y-m-d H:i:s');
            $dataSave = $this->CommericalBanners->patchEntity($dataSave, $data);
            if ($this->CommericalBanners->save($dataSave)) {
                $this->Flash->success(__('ad banner  has been added successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/middle_banner/');
            }
        }
        $this->set(compact('datas'));
    }

    public function modelMouseover($id = null) {
        if (empty($id)) {
            $getting_id = $this->Models->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/model_mouseover/' . $getting_id->id);
        }
        $options = $this->Models->find('list', ['keyField' => 'id', 'valueField' => 'model_name']);

        $editData = $this->Models->find('all')->where(['id' => $id])->first();
        $urls_lists = $this->ModelUrl->find('all')->where(['model_id' => $id])->order(['ModelUrl.id' => 'ASC']);

        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data['cover_photo'][0]['tmp_name'])) {
                $fnm1 = "";
                $nofile1 = count($data['cover_photo']);
                for ($xi = 0; $xi < $nofile1; $xi++) {

                    $dataSave = $this->CoverMainPhotos->newEntity();
                    $data['ref_id'] = $data['model_id'];
                    $data['photo_type'] = 3; // 3 for 5 cover photo
                    $data['page_type'] = 2;  //2 for model
                    //pr($data['photo_filess'][$xi]);
                    if (isset($data['cover_photo'][$xi]['tmp_name'])) {
                        //echo "hhi"; exit;
                        $path = PHOTOS;

                        $extname = explode(".", $data['cover_photo'][$xi]['name'])[1];
                        $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                        move_uploaded_file($data['cover_photo'][$xi]['tmp_name'], $path . $customname);

                        $fnm1 .= $videoFiles . ',';
                        $data['photo_name'] = $videoFiles;
                        $dataSave = $this->CoverMainPhotos->patchEntity($dataSave, $data);
                        $this->CoverMainPhotos->save($dataSave);
                    }
                }
            }
            $dataSave1 = $this->Models->newEntity();
            $dataSave1->id = $id;

            if (!empty($data['mini_pic']['tmp_name'])) {
                $miniature_pic = $this->Custom->simpleImageUpload($data['mini_pic']['tmp_name'], $data['mini_pic']['name'], PHOTOS, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
                $dataSave1->miniature_pic = $miniature_pic;
            } else {
                $dataSave1->miniature_pic = $editData->miniature_pic;
            }

            if (!empty($data['cov_pic']['tmp_name'])) {
                $miniature_pic = $this->Custom->simpleImageUpload($data['cov_pic']['tmp_name'], $data['cov_pic']['name'], PHOTOS, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
                $dataSave1->cover_pic = $miniature_pic;
            } else {
                $dataSave1->cover_pic = $editData->cover_pic;
            }


            $dataSave1 = $this->Models->patchEntity($dataSave1, $data);
            $this->Models->save($dataSave1);


            $u = 0;
            foreach ($data['url'] as $url) {


                $dataSave = $this->ModelUrl->newEntity();
                $data['model_id'] = $data['model_id'];
                $data['urlname'] = $data['urlname'][$u];
                $data['url'] = $url;
                $data['release_date'] = date('Y-m-d');
                $dataSave = $this->ModelUrl->patchEntity($dataSave, $data);
                $res = $this->ModelUrl->save($dataSave);
                $u++;
            }









            $this->Flash->success(__('Model Photos added successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/model_mouseover/'.$id);
        }
        $cover_photo = $this->CoverMainPhotos->find('all')->where(['page_type' => 2, 'photo_type' => 3, 'ref_id' => $id])->order(['sort_order' => 'ASC']);

        $this->set(compact('urls_lists', 'options', 'id', 'cover_photo', 'editData'));
    }

    public function basicSceneSetting($id = null) {
        if (empty($id)) {
            $getting_id = $this->Scenes->find('all')->first();
            $this->redirect(HTTP_ROOT . 'appadmins/basic_scene_setting/' . $getting_id->id);
        }
        $options = $this->Scenes->find('list', ['keyField' => 'id', 'valueField' => 'scene_name']);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //CoverMainPhotos 5 photo
            $fnm1 = "";
            $nofile1 = count($data['cover_photo']);
            if (!empty($data['cover_photo'][0]['tmp_name'])) {
                for ($xi = 0; $xi < $nofile1; $xi++) {

                    $dataSave = $this->CoverMainPhotos->newEntity();
                    $data['ref_id'] = $data['scene_id'];
                    $data['photo_type'] = 3;
                    $data['page_type'] = 1;

                    //pr($data['photo_filess'][$xi]);
                    if (isset($data['cover_photo'][$xi]['tmp_name'])) {
                        //echo "hhi"; exit;
                        $path = PHOTOS;

                        $extname = explode(".", $data['cover_photo'][$xi]['name'])[1];
                        $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                        move_uploaded_file($data['cover_photo'][$xi]['tmp_name'], $path . $customname);

                        $fnm1 .= $videoFiles . ',';
                        $data['photo_name'] = $videoFiles;
                        $dataSave = $this->CoverMainPhotos->patchEntity($dataSave, $data);
                        $this->CoverMainPhotos->save($dataSave);
                    }
                }
            }
            //Home page 4 photo
            $fnm2 = "";
            $nofile2 = count($data['landing_photo']);
            if (!empty($data['landing_photo'][0]['tmp_name'])) {
                for ($xi = 0; $xi < $nofile2; $xi++) {

                    $dataSave2 = $this->CoverMainPhotos->newEntity();
                    $data['ref_id'] = $data['scene_id'];
                    $data['photo_type'] = 1;
                    $data['page_type'] = 1;

                    //pr($data['photo_filess'][$xi]);
                    if (isset($data['landing_photo'][$xi]['tmp_name'])) {
                        //echo "hhi"; exit;
                        $path = PHOTOS;

                        $extname = explode(".", $data['landing_photo'][$xi]['name'])[1];
                        $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                        move_uploaded_file($data['landing_photo'][$xi]['tmp_name'], $path . $customname);

                        $fnm2 .= $videoFiles . ',';
                        $data['photo_name'] = $videoFiles;
                        $dataSave2 = $this->CoverMainPhotos->patchEntity($dataSave2, $data);
                        $this->CoverMainPhotos->save($dataSave2);
                    }
                }
            }
            //Home page single photo
            $fnm3 = "";
            $nofile3 = count($data['landscroll_photo']);
            
            if (!empty($data['landscroll_photo'][0]['tmp_name'])) {
                for ($xi = 0; $xi < $nofile3; $xi++) {

                    $dataSave3 = $this->CoverMainPhotos->newEntity();
                    $data['ref_id'] = $data['scene_id'];
                    $data['photo_type'] = 2;
                    $data['page_type'] = 1;

                    //pr($data['photo_filess'][$xi]);
                    if (isset($data['landscroll_photo'][$xi]['tmp_name'])) {
                        //echo "hhi"; exit;
                        $path = PHOTOS;

                        $extname = explode(".", $data['landscroll_photo'][$xi]['name'])[1];
                        $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                        move_uploaded_file($data['landscroll_photo'][$xi]['tmp_name'], $path . $customname);

                        $fnm2 .= $videoFiles . ',';
                        $data['photo_name'] = $videoFiles;
                        $dataSave3 = $this->CoverMainPhotos->patchEntity($dataSave3, $data);
                        $this->CoverMainPhotos->save($dataSave3);
                    }
                }
            }

            /*
            $dataSave3 = $this->CoverMainPhotos->newEntity();
            $data['ref_id'] = $data['scene_id'];
            $data['photo_type'] = 2;
            $data['page_type'] = 1;

            //pr($data['photo_filess'][$xi]);
            if (!empty($data['landscroll_photo']['tmp_name'])) {
                //echo "hhi"; exit;
                $path = PHOTOS;

                $extname = explode(".", $data['landscroll_photo']['name'])[1];
                $videoFiles = $customname = md5(time() . rand()) . '.' . $extname;
                move_uploaded_file($data['landscroll_photo']['tmp_name'], $path . $customname);

                $fnm3 .= $videoFiles . ',';
                $data['photo_name'] = $videoFiles;
                $dataSave3 = $this->CoverMainPhotos->patchEntity($dataSave3, $data);
                $this->CoverMainPhotos->save($dataSave3);
            }
            */

            $this->Flash->success(__('Scene Photos added successfully'));
            $this->redirect(HTTP_ROOT . 'appadmins/basic_scene_setting/'.$id);
        }
        $cover_photo = $this->CoverMainPhotos->find('all')->where(['page_type' => 1, 'photo_type' => 3, 'ref_id' => $id])->order(['sort_order' => 'ASC']);
        $home4pic = $this->CoverMainPhotos->find('all')->where(['page_type' => 1, 'photo_type' => 1, 'ref_id' => $id])->order(['sort_order' => 'ASC']);
        $singlepic = $this->CoverMainPhotos->find('all')->where(['page_type' => 1, 'photo_type' => 2, 'ref_id' => $id])->order(['sort_order' => 'ASC']);
        $this->set(compact('options', 'id', 'cover_photo', 'home4pic', 'singlepic'));
    }

    public function cover5photoorder() {
        $this->viewBuilder()->layout('ajax');
        $array = $_REQUEST['arrayorder'];
        $count = 1;
        pj($array);
        foreach ($array as $idval) {

            $this->CoverMainPhotos->updateAll(['sort_order' => $count], ['id' => $idval]);
            $count++;
        }
        echo "sorted";
        exit;
    }

    public function ourSites($id = null) {

        if (@$id) {
            $this->OurSites->hasMany('OurSitesPhotos', ['className' => 'OurSitesPhotos', 'foreignKey' => 'site_id']);
            $editData = $this->OurSites->find('all')->contain(['OurSitesPhotos'])->where(['OurSites.id' => $id])->first();
            $photocount1 = $this->OurSitesPhotos->find('all')->where(['OurSitesPhotos.site_id' => $id])->count();
            $photocount = 5 - $photocount1;
        } else {
            $photocount = 5;
        }
        $this->OurSites->hasMany('OurSitesPhotos', ['className' => 'OurSitesPhotos', 'foreignKey' => 'site_id']);
        $datas = $this->OurSites->find('all')->contain(['OurSitesPhotos'])->order(['OurSites.id' => 'DESC']);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //pj($data);exit;
            // echo count($data['c_image']); exit;


            if ($data['c_image'][0]['name']) {
                if (count($data['c_image']) > $photocount) {
                    if ($data['id']) {
                        $this->Flash->error(__('You cant select maximum 5 images'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/our_sites/' . $data['id']);
                    } else {
                        $this->Flash->error(__('You cant select maximum 5 images'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/our_sites/');
                    }
                }
            }

            $dataSave = $this->OurSites->newEntity();
            if ($data['image']['tmp_name']) {
                $imageName = $this->Custom->simpleImageUpload($data['image']['tmp_name'], $data['image']['name'], OURSITES, array('png', 'PNG', 'ico', 'jpg', 'JPG', 'jpeg', 'JPEG'));
                $data['logo'] = $imageName;
            } else {
                $editData = $this->OurSites->find('all')->where(['OurSites.id' => $data['id']])->first();
                $data['logo'] = $editData['logo'];
            }
            $data['descriptions'] = $data['descriptions'];
            $data['link'] = $data['link'];
            $data['created'] = date('Y-m-d H:i:s');
            $data['video_quality'] = implode(",", $data['video_quality']);
            $data['is_active'] = 1;
            $dataSave = $this->OurSites->patchEntity($dataSave, $data);
            if ($this->OurSites->save($dataSave)) {
                $lastid = $dataSave->id;
                // pj($data['c_image'][1]['name']); exit;
                $path = OURSITES; //


                for ($i = 0; $i < count($data['c_image']); $i++) {
                    $file_extension = '';
                    $photoname = '';
                    $validextensions = array("jpeg", "jpg", "png");
                    $ext = explode('.', basename($data['c_image'][$i]['name']));
                    $file_extension = end($ext);
                    $photoname = time() . '-' . $i . "." . $file_extension;
                    $target_path = $path . $photoname;
                    if (in_array($file_extension, $validextensions)) {
                        if (move_uploaded_file($data['c_image'][$i]['tmp_name'], $target_path)) {
                            $dataSaveP = $this->OurSitesPhotos->newEntity();
                            $datap['id'] = '';
                            $datap['site_id'] = $lastid;
                            $datap['file_name'] = $photoname;

                            $dataSaveP = $this->OurSitesPhotos->patchEntity($dataSaveP, $datap);
                            $this->OurSitesPhotos->save($dataSaveP);
                            // $this->Flash->success(__('ad banner  has been added successfully'));
                        }
                    }
                }









                if ($data['id']) {
                    $this->Flash->success(__('Data  has been udpated successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/our_sites/' . $data['id']);
                } else {
                    $this->Flash->success(__('Data  has been added successfully'));
                    $this->redirect(HTTP_ROOT . 'appadmins/our_sites/');
                }
            }
        }
        $this->set(compact('datas', 'editData', 'id', 'photocount'));
    }

    public function deleteOurSitesPhotos($id) {
        if ($id) {
            $list = $this->OurSitesPhotos->find('all')->where(['OurSitesPhotos.id' => $id])->first();
            unlink(OURSITES . $list->file_name);
            $delete = $this->OurSitesPhotos->get($id);
            $this->OurSitesPhotos->delete($delete);
            $this->redirect(HTTP_ROOT . 'appadmins/our_sites/' . $list->site_id);
        }
    }

    public function waterMarkSetting() {
        $list = $this->WatermarkSettings->find('all')->where(['WatermarkSettings.id' => 1])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->WatermarkSettings->newEntity();
            if ($data['water_mark_image']['tmp_name']) {
                $imageName = $this->Custom->simpleImageUpload($data['water_mark_image']['tmp_name'], $data['water_mark_image']['name'], WATERMARK, array('png', 'PNG'));
                $data['water_mark_image'] = $imageName;
            } else {
                $editData = $this->WatermarkSettings->find('all')->where(['WatermarkSettings.id' => 1])->first();
                $data['water_mark_image'] = $editData['water_mark_image'];
            }
            $data['id'] = 1;
            $dataSave = $this->WatermarkSettings->patchEntity($dataSave, $data);
            if ($this->WatermarkSettings->save($dataSave)) {
                $this->redirect(HTTP_ROOT . 'appadmins/water_mark_setting/');
            }
        }
        $this->set(compact('list'));
    }

    public function modelHairColor() {
        $list = $this->Color->find('all')->where(['type' => 1]);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->Color->newEntity();
            $data['type'] = 1;
            $dataSave = $this->Color->patchEntity($dataSave, $data);
            if ($this->Color->save($dataSave)) {
                $this->Flash->success(__('Hair color  has been added successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/model_hair_color/');
            }
        }
        $this->set(compact('list'));
    }

    public function modelEyeColor() {
        $list = $this->Color->find('all')->where(['type' => 2]);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataSave = $this->Color->newEntity();
            $data['type'] = 2;
            $dataSave = $this->Color->patchEntity($dataSave, $data);
            if ($this->Color->save($dataSave)) {
                $this->Flash->success(__('Eye color  has been added successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/model_eye_color/');
            }
        }
        $this->set(compact('list'));
    }

}
