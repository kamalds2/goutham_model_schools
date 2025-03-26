<?php
/**
 * Index
 * This is main default controller 
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
  class pages extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {
      parent::__construct();
        $this->menus();
    }
     
    public function pagedetails($page_type){

       $this->view->pages = $this->model->getPageDetails($page_type); 
    
      
        $this->view->LoadView($page_type);
      }        
      
    public function addContactDetails() { 
        
            $res = $this->model->addContactDetails($_POST);
          
            $this->pagedetails('contact'); 
         
        }
     
     
  }
?>