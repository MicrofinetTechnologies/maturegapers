<?php

  namespace App\Controller;

  use App\Controller\AppController;
  use Cake\Controller\Controller;
  use Cake\Event\Event;
  use Cake\ORM\Query;
  use Cake\ORM\TableRegistry;
  use Cake\I18n\Time;

  class AppController extends Controller
   {

   public function initialize() {
    parent::initialize();
    // date_default_timezone_set('Asia/Kolkata');
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadModel('Users');
    $this->loadModel('FooterSettings');
    $this->loadModel('Bannersettings');
    $this->loadModel('SocialMedia');
    $this->loadModel('Skincolor');
    $this->loadComponent('Auth', [
       'authenticate' => [
          'Form' => [
             'fields' => ['username' => 'email', 'password' => 'password']
          ]
       ]
    ]);
    $this->loadComponent('Auth', [
       'loginRedirect' => [
          'controller' => 'Users',
          'action' => 'login'
       ],
       'logoutRedirect' => [
          'controller' => 'Users',
          'action' => 'login',
       ]
    ]);

   }

   public function beforeRender(Event $event) {
    $this->loadModel('GeneralSettings');
    $this->loadModel('PaymentWidget');
    $type = $this->Auth->user('type');
    $name = $this->Auth->user('name');
    $email = $this->Auth->user('email');
    $user_id = $this->Auth->user('id');
    //$user_id = $this->request->session()->read('Auth.User.id');
    $BANNER_SETTING_DATA = TableRegistry::get('Bannersettings')->find('all')->where(['id' => 1])->first();
    $paymentwidget = TableRegistry::get('PaymentWidget')->find('all')->where(['id' => 1])->first();
    $copyRights = TableRegistry::get('FooterSettings')->find('all')->where(['is_active' => 1, 'id' => 1])->first();
    $address = TableRegistry::get('FooterSettings')->find('all')->where(['is_active' => 1, 'id' => 2])->first();
    $media = TableRegistry::get('SocialMedia')->find('all')->where(['is_active' => 1])->order(['SocialMedia.sort_order' => 'ASC']);
    $siteDetails = TableRegistry::get('GeneralSettings')->find('all')->where(['id'=>1])->first();
    $skincolor = TableRegistry::get('Skincolor')->find('all')->where(['id'=>1])->first();
    $this->set(compact('type', 'name', 'email', 'user_id', 'copyRights', 'address', 'media','siteDetails','skincolor','paymentwidget','BANNER_SETTING_DATA'));

   }  
   

   }
