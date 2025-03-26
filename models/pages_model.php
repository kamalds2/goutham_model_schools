<?php


	class pages_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getPageDetails($page_type) {		     
		    $url = RESTURL."goutham/getpagedetails/".$page_type; 
		    $res = $this->CallAPI("GET",$url); 
		    
		    return $res;
		}
 


public function addContactDetails($data){ 

    $url = RESTURL."goutham/sendenquiry";
    // echo $url;var_dump(json_encode($data));die();  
    $res = $this->CallAPI("POST",$url,$data); 
    return $res;
  }



	}
	