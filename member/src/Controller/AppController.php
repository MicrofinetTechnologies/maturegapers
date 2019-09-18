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
    $paymentwidget = $this->PaymentWidget->find('all')->where(['id' => 1])->first();
    $copyRights = $this->FooterSettings->find('all')->where(['is_active' => 1, 'id' => 1])->first();
    $address = $this->FooterSettings->find('all')->where(['is_active' => 1, 'id' => 2])->first();
    $media = $this->SocialMedia->find('all')->where(['is_active' => 1])->order(['SocialMedia.sort_order' => 'ASC']);
    $siteDetails = $this->GeneralSettings->find('all')->where(['id'=>1])->first();
    $skincolor = $this->Skincolor->find('all')->where(['id'=>1])->first();
    $this->set(compact('type', 'name', 'email', 'user_id', 'copyRights', 'address', 'media','siteDetails','skincolor','paymentwidget'));

   }  
   

   }
