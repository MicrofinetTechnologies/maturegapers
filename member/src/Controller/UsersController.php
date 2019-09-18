<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use ZipArchive;
use \RecursiveIteratorIterator;

require_once(ROOT . '/vendor' . DS . 'Paypal' . DS . 'PaypalPro.php');
require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');

use PaypalPro;

class UsersController extends AppController {

    public $paginate = [
        'limit' => 40,
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Paginator');
        $this->loadModel('Users');
        $this->loadModel('Pages');
        $this->loadModel('EventSchedules');
        $this->loadModel('Events');
        $this->loadModel('Photos');
        $this->loadModel('Videos');
        $this->loadModel('EventTickets');
        $this->loadModel('EventBookingTickets');
        $this->loadModel('EventBookings');
        $this->loadModel('Settings');
        $this->loadModel('WelcomeCms');
        $this->loadModel('FeatureEvents');
        $this->loadModel('Banners');
        $this->loadModel('Testimonials');
        $this->loadModel('JccGetways');
        $this->loadModel('Scenes');
        $this->loadModel('SetModel');
        $this->loadModel('Memberships');
        $this->loadModel('UserMembershipsSubscriptions');
        $this->loadModel('ModelPhotos');
        $this->loadModel('Models');
        $this->loadModel('ModelBanners');
        $this->loadModel('AdBannners');
        $this->loadModel('AdBannerCount');
        $this->loadModel('PhotoGallery');
        $this->loadModel('ScenesVideos');
        $this->loadModel('ScenesPhotoGallery');
        $this->loadModel('ScenesPhotos');
        $this->loadModel('HomeCms');
        $this->loadModel('OurSites');
        $this->loadModel('OurSitesPhotos');
        $this->loadModel('ModelUrl');
        $this->loadModel('GeneralSettings');
        $this->loadModel('Map');
        $this->loadModel('Dbtable');
    }

    public function beforeFilter(Event $event) {
        // $this->Auth->allow(['adCount', 'ad', 'webrootRedirect', 'paymentProcess', 'printTicket', 'pdfTicket', 'paymentCancel', 'paymentSuccess', 'payment', 'paymentConfirmation', 'personalInfo', 'ajaxLoadTicket', 'paymentConfirmation', 'ajaxTicketAvailable', 'ajaxTicketCheck', 'ajaxEvents', 'eventDetails', 'login', 'index', 'events', 'scenes', 'joinus', 'emailvalidate', 'model', 'modelSingle', 'modelGallery', 'scenceSingle', 'sceneGallery', 'member', 'setBannerCookie', 'ourSites', 'search','downloadAction','setBannerCookies', 'contactUs','webMaster','content','privacyPolicy']);
        $this->Auth->allow(['login', 'webrootRedirect']);
    }

    public function bonusVideo() {
        $data = $this->request->query();
        if (isset($data['scene-name']) && !empty($data['scene-name'])) {
            $name = $data['scene-name'];
            $id = $this->Custom->lastValue($name);

            $video_download = $this->GeneralSettings->find('all')->where(['id' => 1])->first();

            $scenesdetails = $this->Scenes->find('all')->where(['id' => $id])->first();

            $scenevideo = $this->ScenesVideos->find('all')->where(['scene_id' => $id, 'is_tailer' => 'Is bonus'])->first();

            $allvideos = $this->ScenesVideos->find('all')->where(['scene_id' => $id, 'is_tailer' => 'Is bonus', 'id NOT IN' => $scenevideo->id]);
        } else {
            return redirect(['controller' => 'users', 'action' => 'scenes']);
        }

        if (isset($data['vid']) && !empty($data['vid'])) {
            $scenevideo = $this->ScenesVideos->find('all')->where(['id' => $data['vid'], 'is_tailer' => 'Is bonus'])->first();
            $allvideos = $this->ScenesVideos->find('all')->where(['scene_id' => $id, 'is_tailer' => 'Is bonus', 'id NOT IN' => $data['vid']]);
        }

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_title));
        $meta_keyword = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_keyword));
        $meta_description = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_description));
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));
        $this->set(compact('scenesdetails', 'scenevideo', 'allvideos', 'video_download'));
    }

    public function search() {
        if ($this->request->is('get')) {
            $data = $this->request->query();
            $scenes = $this->Scenes->find('all')->where(['scene_name LIKE' => '%' . $data['key'] . '%']);
            $scenescount = $scenes->count();
            $models = $this->Models->find('all')->where(['model_name LIKE' => '%' . $data['key'] . '%']);
            $modelscount = $models->count();
        }

        $this->set(compact('scenes', 'scenescount', 'models', 'modelscount'));
    }

    public function ourSites() {
        $this->viewBuilder()->layout('default');

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 15])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);



        $this->OurSites->hasMany('OurSitesPhotos', ['className' => 'OurSitesPhotos', 'foreignKey' => 'site_id']);
        $datas = $this->OurSites->find('all')->contain(['OurSitesPhotos'])->where(['OurSites.is_active' => 1])->order(['OurSites.id' => 'DESC']);

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        $this->set(compact('banners', 'datas'));
    }

    public function member() {
        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);



        $this->set(compact('banners', 'scenesDetails'));
    }

    public function setBannerCookie($id = null, $move = null) {
        setcookie("scene_id", $id, time() + (86400 * 30), "/");
        if (!empty($move)) {
            setcookie("section_point", $move, time() + (86400 * 30), "/");
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        //$_COOKIE['scene_id'];
        exit;
    }

    public function setBannerCookies($id = null) {

//            setcookie("scene_id", $data['id'], time() + (86400 * 30), "/");
//            echo json_encode(['id'=>$_COOKIE['scene_id']]);  
        $this->set(compact('id'));
    }

    public function sceneGallery($id = null, $gallery_name = null) {

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $scenesdetails = $this->Scenes->find('all')->where(['id' => $id])->first();

        $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_title));
        $meta_keyword = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_keyword));
        $meta_description = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_description));
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));
        $scenedetails = $this->Scenes->find('all')->where(['id' => $id, 'is_active' => 1])->first();

        $download = $this->GeneralSettings->find('all')->where(['id' => 1])->first();

        $sceneallphotos = $this->ScenesPhotos->find('all')->where(['scene_id' => $id, 'is_active' => 1, 'gal_name' => $gallery_name])->order(['sort_order' => 'ASC']);
        $this->set('scenesphotos', $this->paginate($sceneallphotos));
        $this->set(compact('sceneallphotos', 'gallery_name', 'id', 'scenedetails', 'download'));
    }

    public function model() {
        $this->viewBuilder()->layout('default');

        //$pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));


        $modelDetails = $this->Models->find('all')->where(['is_active' => 1, 'release_date <=' => date('Y-m-d')])->order(['sort_order' => 'ASC']);
        if (!empty($_GET['q']) && $_GET['q'] != 'All') {
            $modelDetails = $this->Models->find('all')->where(['is_active' => 1, 'release_date <=' => date('Y-m-d'), 'model_name LIKE' => $_GET['q'] . '%'])->order(['sort_order' => 'ASC']);
        }

        $cnt_md = $modelDetails->count();

        $this->paginate['limit'] = 36;
        $this->set('modelDetails', $this->paginate($modelDetails));

        $this->set(compact('banners', 'pageDetails', 'cnt_md'));
    }

    public function modelSingle() {

        if (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) {
            $name = $_REQUEST['name'];
            $id = $this->Custom->lastValue($name);
        } else {
            return redirect(['controller' => 'users', 'action' => 'model']);
        }

        $modeldetails = $this->Models->find('all')->where(['id' => $id])->first();
        $modelUrl = $this->ModelUrl->find('all')->where(['ModelUrl.model_id' => $id]);

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
        if ($modeldetails->seo_keyword) {
            $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $modeldetails->seo_keyword));
        } else {
            $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_title));
        }

        $meta_keyword = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_keyword));
        $meta_description = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_description));
        $this->set(compact('modelUrl', 'meta_title', 'meta_keyword', 'meta_description'));




        $modelphotos = $this->ModelPhotos->find('all')->where(['model_id' => $id, 'is_active' => 1])->order(['sort_order' => 'ASC'])->limit(3);



        $modelgallery = $this->PhotoGallery->find('all')->where(['model_id' => $id, 'is_active' => 1, 'releasedate <=' => date('Y-m-d')])->order(['sort_order' => 'ASC']);

        $modelscenes = $this->Scenes->find('all')->where(['OR' => ['model1' => $id, 'model2' => $id, 'model3' => $id]])->where(['is_active' => 1, 'releasedate <=' => date('Y-m-d')]);
        $modelscenescount = $modelscenes->count();

        $modelBanner = $this->ModelBanners->find('all')->where(['model_id' => $id, 'is_active' => 1])->order(['sort_order' => 'ASC'])->first();

        $this->set(compact('modeldetails', 'modelscenes', 'modelBanner', 'modelscenescount', 'modelphoto', 'modelgallery', 'id'));
    }

    public function modelGallery($id = null, $gallery_name = null) {
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 8])->first();

        $download = $this->GeneralSettings->find('all')->where(['id' => 1])->first();

        $modeldetails = $this->Models->find('all')->where(['id' => $id])->first();

        $modelUrl = $this->ModelUrl->find('all')->where(['ModelUrl.model_id' => $modeldetails->id]);

        $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_title));
        $meta_keyword = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_keyword));
        $meta_description = str_replace('%', HTTP_ROOT, str_replace('#', $modeldetails->model_name, $pageDetails->meta_description));
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));



        $modelphotos = $this->ModelPhotos->find('all')->where(['model_id' => $id, 'is_active' => 1, 'pro_pic' => 1])->order(['sort_order' => 'ASC'])->first();
        if ($modelphotos == null) {
            $modelphotos = $this->ModelPhotos->find('all')->where(['model_id' => $id, 'is_active' => 1])->order(['sort_order' => 'ASC'])->first();
            $modelphoto = $modelphotos;
        } else {
            $modelphoto = $modelphotos;
        }

        $modelallphotos = $this->ModelPhotos->find('all')->where(['model_id' => $id, 'is_active' => 1, 'gal_name' => $gallery_name])->order(['sort_order' => 'ASC']);
        $modelscenes = $this->Scenes->find('all')->where(['OR' => ['model1' => $id, 'model2' => $id, 'model3' => $id]]);
        $this->set('modelphotos', $this->paginate($modelallphotos));
        $modelscenescount = $modelscenes->count();
        $modelBanner = $this->ModelBanners->find('all')->where(['model_id' => $id, 'is_active' => 1])->order(['sort_order' => 'ASC'])->first();
        $this->set(compact('modelUrl', 'modeldetails', 'modelscenes', 'modelBanner', 'modelscenescount', 'modelphoto', 'modelallphotos', 'gallery_name', 'id', 'download'));
    }

    public function scenceSingle() {
        if (isset($_REQUEST['scene-name']) && !empty($_REQUEST['scene-name'])) {
            $name = $_REQUEST['scene-name'];
            $id = $this->Custom->lastValue($name);
        } else {
            return redirect(['controller' => 'users', 'action' => 'scenes']);
        }

        $video_download = $this->GeneralSettings->find('all')->where(['id' => 1])->first();

        $scenesdetails = $this->Scenes->find('all')->where(['id' => $id])->first();

        $allscenes = $this->Scenes->find('all')->where(['is_active' => 1, 'releasedate <=' => date('Y-m-d')])->order('rand()')->limit(6);

        $scenevideo = $this->ScenesVideos->find('all')->where(['scene_id' => $id, 'is_tailer' => 'Is main'])->first();

        $scenegallery = $this->ScenesPhotoGallery->find('all')->where(['scenes_id' => $id, 'releasedate <=' => date('Y-m-d')]);
        //pj($scenevideo);
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        if ($scenesdetails->seo_keyword) {
            $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $scenesdetails->seo_keyword));
        } else {
            $meta_title = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_title));
        }
        $meta_keyword = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_keyword));
        $meta_description = str_replace('%', HTTP_ROOT, str_replace('#', $scenesdetails->scene_name, $pageDetails->meta_description));
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));

        $this->set(compact('scenesdetails', 'scenevideo', 'scenegallery', 'allscenes', 'video_download'));
    }

    public function joinus() {
        $this->viewBuilder()->layout('default');

        //$pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        $membership = $this->Memberships->find('all')->where(['is_active' => 1]);

        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $data = $this->request->data;




            if (!empty($data['email'])) {

                $checkemail = $this->emailExists($data['email']);

                if ($checkemail == 1) {
                    return $this->redirect(['controller' => 'Users', 'action' => 'joinus']);
                } else {
                    $data['password'] = $data['password'];
                    $data['unique_id'] = $this->Custom->generateUniqNumber();
                    $data['reg_ip'] = $this->Custom->getRealIpAddress();
                    $data['is_active'] = 0;
                    $data['type'] = 2;
                    $data['reg_dt'] = date("Y-m-d H:i:s");
                    $user = $this->Users->patchEntity($user, $data);
                    $this->Users->save($user);

                    if (!empty($user->id)) {

                        $user_membership = $this->UserMembershipsSubscriptions->newEntity();
                        $data['user_id'] = $user->id;
                        $membership_data = $this->Memberships->find('all')->where(['id' => $data['membership'], 'is_active' => 1])->first();

                        $data['membershipsid'] = $data['membership'];
                        $data['duration'] = $membership_data->duration;
                        $data['price'] = $membership_data->m_price;
                        $data['membership_name'] = $membership_data->membership_name;
                        $data['suscription_date'] = $data['reg_dt'];
                        $user_membership = $this->UserMembershipsSubscriptions->patchEntity($user_membership, $data);

                        $this->UserMembershipsSubscriptions->save($user_membership);
                        $this->redirect('https://wnu.com/secure/services/?api=join&email=' . $data['email'] . '&username=ef5ak5ckf&password=e3za73szx&x_site=1&x_member=156227&x_natssess=8540457e12723f9cc05b464bbe973f29&reseller=a&co_code=eu269&retry_count=2&pobgcolor=%23FFFFFF&potitlebgcolor=%23FFFFFF&potitlecolor=%23000000&errorcolor=%23000000&no_userpass=1&pi_code=wawre19p284714&response_post=1&selected_type=CC&pi_returnurl=' . HTTP_ROOT . 'joinus&x_alt_returnurl=' . HTTP_ROOT . 'joinus&x_initial_member=156227%3A8540457e12723f9cc05b464bbe973f29&x_return_type=initial&x_returnurl=' . HTTP_ROOT . 'joinus&affref=No+Referring+URL');
                    }
                }
            }
        }

        $this->set(compact('banners', 'pageDetails', 'membership'));
    }

    public function emailvalidate() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $res = $this->Users->find('all')->where(['email' => $data['email']])->count();
        }
        if ($res >= 1) {
            echo json_encode(array('status' => 'error', 'message' => 'Email already exists.'));
        } else if ($res == 0) {
            echo json_encode(array('status' => 'success', 'message' => 'Email is available.'));
        }
        exit;
    }

    public function emailExists($email) {

        $res = $this->Users->find('all')->where(['email' => $email])->count();
        if ($res >= 1) {
            return 1;
        } else if ($res == 0) {
            return 2;
        }
    }

    public function scenes() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));
        $scenesDetail = $this->Scenes->find('all')->where(['is_active' => 1, 'releasedate <=' => date('Y-m-d')])->order(['sort_order' => 'ASC']);
        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        $this->paginate['limit'] = 36;
        $this->set('scenesDetail', $this->paginate($scenesDetail));
        $this->set(compact('banners'));
    }

    public function index() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);

        $scenesDetails = $this->Scenes->find('all')->where(['is_active' => 1, 'releasedate <=' => date('Y-m-d')]);
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();

        $this->set(compact('banners', 'scenesDetails', 'homecms'));
    }

    public function login() {
        $this->viewBuilder()->layout('login');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));


        if ($this->request->is('post')) {
            $data = $this->request->data;
            $available = $this->Dbtable->find('all')->where(['username' => $data['username']])->count();
            if ($available == 1) {
                $usr_det = $this->Dbtable->find('all')->where(['username' => $data['username']])->first();
                if (sha1($data['password']) == $usr_det->password) {
                    $this->Auth->setUser($usr_det);
                    $this->Flash->success(__('Login Successful'));
                    return $this->redirect(HTTP_ROOT);
                } else {
                    $this->Flash->error(__('Invalid Username or Password!'));
                    return $this->redirect(HTTP_ROOT . 'Login');
                }
            } else {
                $this->Flash->error(__('Acount Not found'));
                return $this->redirect(HTTP_ROOT . 'Login');
            }
        }
    }

    public function logout() {
        //echo HTTP_REMOTE;exit;
        $this->Flash->success(__('You are now logged out.'));
        if ($this->Auth->logout()) {
            return $this->redirect(HTTP_REMOTE . '');
        }
    }

    public function ad() {
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $ad_manager = $this->AdBannners->find('all')->where(['AdBannners.ad_id' => $id])->first();
        }

        $this->set(compact('ad_manager'));
    }

    public function adCount() {
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $user = $this->AdBannerCount->newEntity();
            $data['ad_id'] = $id;
            $data['count_dt'] = date("Y-m-d H:i:s");
            $data['ip'] = $this->Custom->getRealIpAddress();
            $user = $this->AdBannerCount->patchEntity($user, $data);
            $this->AdBannerCount->save($user);
        }
        if (isset($_REQUEST['url']) && !empty($_REQUEST['url'])) {
            $url = $_REQUEST['url'];
            return $this->redirect($url);
        }

        $this->set(compact('ad_manager'));
    }

    public function webrootRedirect() {

        $this->viewBuilder()->layout('login');
        return $this->redirect(HTTP_ROOT . 'login/');
    }

    public function ajaxCheckEmailAvail() {
        $data = $this->request->input('json_decode', TRUE);
        $email = $data['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('status' => 'error', 'msg' => ''));
        } else {
            $query = $this->Users->find('all')
                    ->select(['Users.id', 'Users.email'])
                    ->where(['Users.email' => $email]);
            $count = $query->count();
            if ($count) {
                echo json_encode(array('status' => 'error', 'msg' => 'Email id already exists!'));
            } else {
                echo json_encode(array('status' => 'success', 'msg' => 'Email id is available.'));
            }
        }
        exit;
    }

    public function personalInfo() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $title_for_layout = $pageDetails->meta_title;
        $metaKeyword = $pageDetails->meta_keyword;
        $metaDescription = $pageDetails->meta_description;
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (@$data['paynow']) {
                if ($data['firstName'] == '') {
                    $this->Flash->error(__('Please enter your first name'));
                    return $this->redirect(HTTP_ROOT . 'personal-info/');
                } else if ($data['lastName'] == '') {
                    $this->Flash->error(__('Please enter your last name'));
                    return $this->redirect(HTTP_ROOT . 'personal-info/');
                } else if ($data['phoneNo'] == '') {
                    $this->Flash->error(__('Enter your mobile number'));
                    return $this->redirect(HTTP_ROOT . 'personal-info/');
                } else if ($data['emailAddress'] == '') {
                    $this->Flash->error(__('Please enter your email address'));
                    return $this->redirect(HTTP_ROOT . 'personal-info/');
                } else {
                    $this->EventBookings->updateAll(array('first_name' => $data['firstName'], 'last_name' => $data['lastName'], 'email' => $data['emailAddress'], 'phone' => $data['phoneNo']), array('id' => $this->request->session()->read('EventBookingsId')));
                    return $this->redirect(HTTP_ROOT . 'payment-confirmation/');
                }
            }


            if ($data['event_id'] == "") {
                $this->Flash->error(__('Some things error,plese try again'));
                return $this->redirect(HTTP_ROOT . 'events');
            } else if ($data['totalPrice'] == '') {
                $eventDetail = $this->Events->find('all')->where(['Events.id' => $data['event_id']])->first();
                $this->Flash->error(__('Sorry! No ticket selected'));
                return $this->redirect(HTTP_ROOT . 'event-details/' . $this->Custom->makeSeoUrl($eventDetail->name) . '-' . $data['event_id']);
            } else {

                $event_id = $data['event_id'];
                $sechudle_id = $data['sechudle_id'];
                $EventBookings = $this->EventBookings->newEntity();
                $EventBookings->event_schedule_id = $sechudle_id;
                $EventBookings->event_id = $event_id;
                $EventBookings->ticket_no = 0;
                $EventBookings->total_amount = 0;
                $EventBookings->payment_mode = 0;
                $EventBookings->payment_status = 0;
                $EventBookings->ip = $this->Custom->getRealIpAddress();
                $EventBookings->qrcode = 0;
                $EventBookings->created = date('Y-m-d H:i:s');
                $EventBookingsId = $this->EventBookings->save($EventBookings);
                if ($EventBookingsId->id) {
                    $this->request->session()->write('eventId', $event_id);
                    $this->request->session()->write('sechudleId', $sechudle_id);
                    $this->request->session()->write('EventBookingsId', $EventBookingsId->id);
//       if ($this->request->session()->read('sechudleId')) {
//        $this->EventBookingTickets->deleteAll(['event_schedule_id' => $this->request->session()->read('sechudleId')]);
//       }
                    if ($data['quantity']) {
                        $count = 0;
                        $totalQuantity = 0;
                        $totalPrice = 0;
                        foreach ($data['quantity'] as $key => $quantity) {
                            if ($quantity != 0) {
                                $ticketBooking = $this->EventBookingTickets->newEntity();
                                $ticketBooking->id = '';
                                $ticketBooking->event_books_id = $this->request->session()->read('EventBookingsId');
                                $ticketBooking->event_id = $event_id;
                                $ticketBooking->event_schedule_id = $sechudle_id;
                                $ticketBooking->event_ticket_id = $key;
                                $ticketBooking->qty = $quantity;
                                $ticketBooking->price = $data['price'][$count];
                                $ticketBooking->total = $quantity * $data['price'][$count];
                                $ticketBooking->booking_status = 0;
                                $this->EventBookingTickets->save($ticketBooking);
                                $totalQuantity += $quantity;
                                $totalPrice += $quantity * $data['price'][$count];
                            }
                            $count++;
                        }
                        $uniqeTicketId = 'ENC-' . $this->Custom->number_pad($this->request->session()->read('EventBookingsId'));
                        $this->EventBookings->updateAll(array('unique_id' => $uniqeTicketId, 'ticket_no' => $totalQuantity, 'total_amount' => $totalPrice), array('id' => $this->request->session()->read('EventBookingsId')));


                        /* for menual ticket approve 1 below code */
                        // $this->EventBookings->updateAll(array('payment_status' => 1,), array('id' => $this->request->session()->read('EventBookingsId')));
                        // $this->EventBookingTickets->updateAll(array('booking_status' => 1), array('event_books_id' => $this->request->session()->read('EventBookingsId')));
//        ****************************
                    }
                }
            }
        }
        $this->Events->hasOne('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_id', 'conditions' => ['EventSchedules.id' => $this->request->session()->read('sechudleId')]]);
        $eventDetail = $this->Events->find('all')->contain(['EventSchedules', 'Photos', 'Videos'])->where(['Events.id' => $this->request->session()->read('eventId')])->first();

        $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $this->request->session()->read('sechudleId'), 'EventBookingTickets.event_books_id' => $this->request->session()->read('EventBookingsId')]);
        $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $this->request->session()->read('EventBookingsId')])->first();

        $this->set(compact('user', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails'));
    }

    public function paymentConfirmation() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $title_for_layout = $pageDetails->meta_title;
        $metaKeyword = $pageDetails->meta_keyword;
        $metaDescription = $pageDetails->meta_description;
        if (!$this->request->session()->read('EventBookingsId')) {
            return $this->redirect(HTTP_ROOT . 'events');
        } else {
            $jccPayment = $this->JccGetways->find()->where(['JccGetways.id' => 1])->first();
            $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $this->request->session()->read('EventBookingsId')])->first();
            $eventDetail = $this->Events->find('all')->where(['Events.id' => $this->request->session()->read('eventId')])->first();
            $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $this->request->session()->read('sechudleId')])->first();
            $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $this->request->session()->read('sechudleId'), 'EventBookingTickets.event_books_id' => $this->request->session()->read('EventBookingsId')]);

            $this->set(compact('jccPayment', 'user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails'));
        }
    }

    public function payment() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        if (!$this->request->session()->read('EventBookingsId')) {
            return $this->redirect(HTTP_ROOT . 'events');
        } else {

            if ($this->request->is('post')) {
                $data = $this->request->data;
            }

            $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $this->request->session()->read('EventBookingsId')])->first();
            $eventDetail = $this->Events->find('all')->where(['Events.id' => $this->request->session()->read('eventId')])->first();
            $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $this->request->session()->read('sechudleId')])->first();
            $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $this->request->session()->read('sechudleId'), 'EventBookingTickets.event_books_id' => $this->request->session()->read('EventBookingsId')]);

            $this->set(compact('user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails', 'title_for_layout', 'metaKeyword', 'metaDescription'));
        }
    }

    public function paymentSuccess() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();
        $jccResponseCode = $_POST['ResponseCode'];
        $jccReasonCode = $_POST['ReasonCode'];
        $ReasonCodeDesc = $_POST['ReasonCodeDesc'];
        $MerID = $_POST['MerID'];
        $AcqID = $_POST['AcqID'];
        $OrderID = $_POST['OrderID'];
        $ReferenceNo = $_POST['ReferenceNo'];
        if ($jccResponseCode == 1 && $jccReasonCode == 1) {
            $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $OrderID])->first();
            $eventDetail = $this->Events->find('all')->where(['Events.id' => $bookingDetails->event_id])->first();
            $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $bookingDetails->event_schedule_id])->first();
            $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $bookingDetails->event_schedule_id, 'EventBookingTickets.event_books_id' => $OrderID]);
            /* for  ticket approve 1 below code */
            $this->EventBookings->updateAll(array('payment_status' => 1, 'payment_mode' => 1, 'transaction_id' => $ReferenceNo), array('id' => $OrderID));
            $this->EventBookingTickets->updateAll(array('booking_status' => 1), array('event_books_id' => $OrderID));


            /* pdf generatecode */
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, HTTP_ROOT . 'pdf-ticket/' . $OrderID);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
            /* pdf mail sending code */
            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'SUCCESS_PAYMENT'])->first();
            $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $to = $bookingDetails->email;
            $name = $bookingDetails->first_name . ' &nbsp;' . $bookingDetails->last_name;
            $from = $emailFrom->value;
            $subject = $emailTemplate->display;
            $file = $bookingDetails->unique_id . '.pdf';
            $message = $this->Custom->paymentSuccessTemplete($emailTemplate->value, $name, $bookingDetails->unique_id, SITE_NAME);
            $this->Custom->sendEmailAttachment($to, $from, $subject, $message, $file);
            /* End pdf mail sending code */
            $this->request->session()->write('sechudleId', '');
            $this->request->session()->write('eventId', '');
            $this->request->session()->write('EventBookingsId', '');

            $this->set(compact('user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails'));
        } else {
            $this->Flash->error(__('Your payment is rejected, Please try again.'));
            return $this->redirect(HTTP_ROOT . 'payment-confirmation/');
        }
    }

    /* -----------not use this methods */

    public function paymentCancel() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        if (!$this->request->session()->read('EventBookingsId')) {
            return $this->redirect(HTTP_ROOT . 'events');
        } else {
            $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $this->request->session()->read('EventBookingsId')])->first();
            $eventDetail = $this->Events->find('all')->where(['Events.id' => $this->request->session()->read('eventId')])->first();
            $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $this->request->session()->read('sechudleId')])->first();
            $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $this->request->session()->read('sechudleId'), 'EventBookingTickets.event_books_id' => $this->request->session()->read('EventBookingsId')]);
            $this->set(compact('user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails', 'title_for_layout', 'metaKeyword', 'metaDescription'));
            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CANCEL_PAYMENT'])->first();
            $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $to = $bookingDetails->email;
            $name = $bookingDetails->first_name . ' &nbsp;' . $bookingDetails->last_name;
            $from = $emailFrom->value;
            $subject = $emailTemplate->display;
            $message = $this->Custom->paymentCanceLTemplete($emailTemplate->value, $name, $bookingDetails->unique_id, SITE_NAME);
            $this->Custom->sendEmail($to, $from, $subject, $message);
        }
    }

    public function pdfTicket($id = 11) {
        $this->viewBuilder()->layout('');
        $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $id])->first();
        $eventDetail = $this->Events->find('all')->where(['Events.id' => $bookingDetails['event_id']])->first();
        $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $bookingDetails['event_schedule_id']])->first();
        $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $bookingDetails['event_schedule_id'], 'EventBookingTickets.event_books_id' => $id]);

        $this->set(compact('user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail', 'pageDetails'));

        if (true) {
            // initializing mPDF
            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename(TICKET_PDF . $bookingDetails->unique_id . '.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function printTicket($id = null) {
        $bookingDetails = $this->EventBookings->find('all')->where(['EventBookings.id' => $id])->first();
        $eventDetail = $this->Events->find('all')->where(['Events.id' => $bookingDetails['event_id']])->first();
        $eventSechudle = $this->EventSchedules->find('all')->where(['EventSchedules.id' => $bookingDetails['event_schedule_id']])->first();
        $ticketDetails = $this->EventBookingTickets->find('all')->contain(['EventTickets'])->where(['EventBookingTickets.event_schedule_id' => $bookingDetails['event_schedule_id'], 'EventBookingTickets.event_books_id' => $id]);

        $this->set(compact('user', 'eventSechudle', 'bookingDetails', 'ticketDetails', 'eventDetail'));
        $this->viewBuilder()->layout('');
    }

    public function downloadAction($id = null, $galleryname = null) {
        $this->viewBuilder()->layout('ajax');

        $source = PHOTOS . $id . '/' . $galleryname;
        $destination = PHOTOS . $id . '/' . $galleryname . '.zip';

        $rootPath = realpath($source);

// Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        if ($zip->close()) {
            echo "file created";
            return $this->redirect(HTTP_ROOT . $destination);
        }

        exit;
    }

    public function webMaster($string = null) {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description', 'pageDetails'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);

        $scenesDetails = $this->Scenes->find('all');
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();

        $this->set(compact('banners', 'scenesDetails', 'homecms'));
    }

    public function content() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 11])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description', 'pageDetails'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);

        $scenesDetails = $this->Scenes->find('all');
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();

        $this->set(compact('banners', 'scenesDetails', 'homecms'));
    }

    public function privacyPolicy($string = null) {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description', 'pageDetails'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);

        $scenesDetails = $this->Scenes->find('all');
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();

        $this->set(compact('banners', 'scenesDetails', 'homecms'));
    }

    public function contactUs() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 6])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description'));
        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);
        $scenesDetails = $this->Scenes->find('all');
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();
        $this->set(compact('banners', 'scenesDetails', 'homecms'));
        if ($this->request->is('post')) {
            $data = $this->request->data;
            /* Mail sending below code */
            $recaptcha = $_REQUEST['g-recaptcha-response'];
            if (empty($recaptcha)) {
                $this->Flash->error(__('Please enter correct captcha code'));
                return $this->redirect(HTTP_ROOT . 'users/contact-us');
            } else {
                $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();
                $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
                $from = $emailFrom->value;
                $name = $data['firstName'] . ' &nbsp;' . $data['lastName'];
                $email = $data['emailAddress'];
                $phone = $data['phoneNo'];
                $subject = $data['subject'];
                $msg = $data['message'];
                $subject = 'Request message from users';
                $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $msg, SITE_NAME);
                $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
                /* Mail sending below code */
                $this->Flash->success(__('Thank you, We will get back to you soon.'));
                return $this->redirect(HTTP_ROOT . 'users/contact-us');
            }
        }
        $map = $this->Map->find('all')->where(['Map.id' => 1])->first();
        $this->set(compact('map', 'pageDetails'));
    }

    public function downloadScenesAction($id = null, $galleryname = null) {
        $this->viewBuilder()->layout('ajax');
        $source = PHOTOS . 'scenes/' . $id . '/' . $galleryname;
        $destination = PHOTOS . 'scenes/' . $id . '/' . $galleryname . '.zip';

        $rootPath = realpath($source);
//HTTP_REMOTE
// Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        if ($zip->close()) {
            echo "file created";
            return $this->redirect(HTTP_ROOT . $destination);
        }

        exit;
    }

}
