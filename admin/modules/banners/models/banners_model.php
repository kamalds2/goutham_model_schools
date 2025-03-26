

	<?php


	class banners_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllPages() {		     
		    $url = RESTURL."banners/getallpages";  
		    $res = $this->CallAPI("POST",$url,$data);
		    return $res;
		}

		public function getPageDetails($id) {		     
		    $url = RESTURL."banners/getpagedetails/".$id; 
		    $res = $this->CallAPI("GET",$url); 

		 		    return $res;
		}

		public function createPage($data) {
		   
		    $url = RESTURL."banners/addpage"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updatePage($data) {
		   
		    $url = RESTURL."banners/updatepage";   
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		 
		    return $res;
		}

		public function deletePage($data) {
			$url = RESTURL."banners/deletepage";   
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}









	}