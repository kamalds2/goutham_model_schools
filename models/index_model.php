<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  class index_model extends Model {
    /*
     * construct
     */
    public function __construct() { 
      parent::__construct();
    } 


    public function getAllPages(){
      $url = RESTURL."goutham/gethomepagedetails";  
      $data=[];
      $data['page_type'] = 'home';
      $res = $this->CallAPI("POST",$url,$data); 
      return $res;
    }


  }
?>