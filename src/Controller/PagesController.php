<?php

  namespace App\Controller;

  use Cake\Core\Configure;
  use Cake\Event\Event;
  use Cake\ORM\Query;
  use Cake\ORM\TableRegistry;

  class PagesController extends AppController
   {

   public function initialize() {
    parent::initialize();
    $this->loadComponent('Custom');
    $this->loadModel('Pages');
    $this->loadModel('Map');
    $this->loadModel('Settings');
    $this->loadModel('EncoreVideos');
    $this->loadModel('EncorePhotos');
    $this->loadModel('Albums');
    $this->loadModel('Banners');
    $this->loadModel('Scenes');
    $this->loadModel('HomeCms');
   }

   public function beforeFilter(Event $event) {
    $this->Auth->allow(['allVideo', 'allPhoto', 'video', 'photo', 'aboutus', 'privacy', 'termsCondition', 'contactUs','webMaster','content','privacyPolicy']);

   }

   public function aboutus() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 7])->first();
    $this->set(compact('pageDetails'));

   }

   public function privacy() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 2])->first();
    $this->set(compact('pageDetails'));

   }

   public function termsCondition() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 3])->first();
    $this->set(compact('pageDetails'));

   }

   public function contactUs() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 12])->first();
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
      return $this->redirect(HTTP_ROOT . 'contact-us');
     } else {
      $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();
      $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
      $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
      $from = $emailFrom->value;
      $name = $data['name'] ;
      $email = $data['email'];
      $phone = $data['phone'];
      $subject1 = $data['subject'];
      $msg = $data['message'];
      $subject = 'Request message from users';
      $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject1, nl2br($msg), SITE_NAME);
      $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
      /* Mail sending below code */
      $this->Flash->success(__('Thank you, We will get back to you soon.'));
      return $this->redirect(HTTP_ROOT . 'contact-us');
     }
    }
    $map = $this->Map->find('all')->where(['Map.id' => 1])->first();
    $this->set(compact('map', 'pageDetails'));

   }

   public function photo() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
    $dataListings = $this->Albums->find('all')->where(['Albums.type' => 1, 'Albums.is_active' => 1])->order(['Albums.sort_order' => 'ASC']);
    $this->set(compact('dataListings', 'pageDetails'));

   }

   public function allPhoto($string = null) {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 4])->first();
    if ($string) {
     $album_id = $this->Custom->lastValue($string);
     $albumName = $this->Albums->find('all')->where(['Albums.id' => $album_id])->first();
     $dataListings = $this->EncorePhotos->find('all')->where(['EncorePhotos.album_id' => $album_id, 'EncorePhotos.is_active' => 1])->order(['EncorePhotos.sort_order' => 'ASC']);
     $dataCount = $this->EncorePhotos->find('all')->where(['EncorePhotos.album_id' => $album_id, 'EncorePhotos.is_active' => 1])->Count();
     $this->set(compact('dataCount', 'albumName', 'dataListings', 'pageDetails'));
    } else {
     return $this->redirect(HTTP_ROOT . 'photo');
    }

   }

   public function video() {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
    $dataListings = $this->Albums->find('all')->where(['Albums.type' => 2, 'Albums.is_active' => 1])->order(['Albums.sort_order' => 'ASC']);
    $this->set(compact('dataListings', 'pageDetails'));

   }

   public function allVideo($string = null) {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 5])->first();
    if ($string) {
     $album_id = $this->Custom->lastValue($string);
     $albumName = $this->Albums->find('all')->where(['Albums.id' => $album_id])->first();
     $dataListings = $this->EncoreVideos->find('all')->where(['EncoreVideos.album_id' => $album_id, 'EncoreVideos.is_active' => 1])->order(['EncoreVideos.sort_order' => 'ASC']);
     $dataCount = $this->EncoreVideos->find('all')->where(['EncoreVideos.album_id' => $album_id, 'EncoreVideos.is_active' => 1])->Count();
     $this->set(compact('dataCount', 'albumName', 'dataListings', 'pageDetails'));
    } else {
     return $this->redirect(HTTP_ROOT . 'video');
    }

   }
   public function webMaster($string = null) {
    $this->viewBuilder()->layout('default');
    $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 13])->first();
        $meta_title = $pageDetails->meta_title;
        $meta_keyword = $pageDetails->meta_keyword;
        $meta_description = $pageDetails->meta_description;
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description','pageDetails'));

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
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description','pageDetails'));

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
        $this->set(compact('meta_title', 'meta_keyword', 'meta_description','pageDetails'));

        $banners = $this->Banners->find('all')->where(['Banners.is_active' => 1, 'banner_id' => 0])->order(['Banners.sort_order' => 'ASC']);

        $scenesDetails = $this->Scenes->find('all');
        $homecms = $this->HomeCms->find('all')->where(['id' => 1])->first();

        $this->set(compact('banners', 'scenesDetails', 'homecms'));
   }


   }
