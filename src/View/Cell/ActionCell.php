<?php

  namespace App\View\Cell;

  use Cake\View\Cell;


  /**
   * Users cell
   */
  class ActionCell extends Cell
   {

   protected $_validCellOptions = [];

   /**
    * Default display method.
    *
    * @return void
    */
   public function footer_social() {
    $this->loadModel('website_icon');
    $websiteicon = $this->website_icon->find('all')->where(['is_active'=>1]);  
    $this->set(compact('websiteicon'));
   }
   public function footer_content() {
   $this->loadModel('FooterSettings');
   $footercont = $this->FooterSettings->find('all')->where(['FooterSettings.id' => '1'])->first();
   
   $this->set(compact('footercont'));
   }
   
   public function middle_advertise() {
   $this->loadModel('CommericalBanners');
   $admiddleImg = $this->CommericalBanners->find('all')->where(['CommericalBanners.type' => '2','CommericalBanners.is_active'=>1])->order('rand()')->first();
   
   $this->set(compact('admiddleImg'));
   }
   public function left_advertise() {
   $this->loadModel('Models');
   $this->loadModel('CommericalBanners');
   $admiddleImg = $this->CommericalBanners->find('all')->where(['CommericalBanners.type' => '1','CommericalBanners.is_active'=>1])->order('rand()')->first();
    $modelData = $this->Models->find('all')->where(['Models.id' => $admiddleImg->model_id])->first();
   $this->set(compact('admiddleImg','modelData'));
   }



 }