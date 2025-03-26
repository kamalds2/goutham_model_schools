<?php

	class banners extends Controller {

	 	/** * Constructor */
	  	public function __construct() {
	    	parent::__construct();	
	    	/*if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');
	    	}*/
    		$this->LoadHelper('ImageUpload');  
	  	}

	  	public function index() { 
		    try{
		      	$this->view->bannersList = $this->model->getAllPages();
		      	$this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs','Pages','ACTS');
      			$this->view->LoadView('managePages', 'banners');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	  	

	  	public function editPage($id){
	  		try{	  
	  			$result = $this->model->getPageDetails($id); 
	  			// var_dump($result);die();
	  			$this->view->pages = $result->pages;
				
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.$page_id,'error_logs','Edit Pages','ACTS');
	  			$this->view->LoadView('editPage', 'banners');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','editPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function addPage(){
	  		try{ 
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','addPage','error_logs','Add Pages','ACTS');
		      	$this->view->LoadView('addPage', 'banners');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  
	  	public function createPage(){
	  		try{ 
	  			  if(!empty($_FILES['image_name']['name'])){
			        $filedir = FRONTUPLOADPATH."pages/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['image_name']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['image_name']['name'], strrpos($_FILES['image_name']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['image_name'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $_POST['image_name'] = $newName.".".strtolower($ext);                  
			    }else $_POST['image_name'] = '';  
	  			$result = $this->model->createPage($_POST);
	  		
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~',$_POST),'error_logs','Add Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~', $_POST),'error_logs','Add Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('banners'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','createPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updatePage(){
	  		try{
	  			
	  			 if(!empty($_FILES['image_name']['name'])){
			        $filedir = FRONTUPLOADPATH."pages/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['image_name']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['image_name']['name'], strrpos($_FILES['image_name']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['image_name'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $_POST['image_name'] = $newName.".".strtolower($ext);   


			    }else $_POST['image_name'] = $_POST['image_name_old'];  
	  			 
	  			$result = $this->model->updatePage($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.implode('~',$_POST),'error_logs','Update Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage'.implode('~', $_POST),'error_logs','Update Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('banners'); 
		      	// $this->redirect('pages/editPage/'.$_POST['page_id']); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function deletePage() {
	    	try{
	      		if(!empty($_POST)) {
	        		$result = $this->model->deletePage($_POST);
	        		if($result) {
		          		$this->session->sets('success_msg','Page Deleted Successfully.');
		          		$this->set_logs($this->session->gets('adminuser_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Delete Pages','ACTS');
			        } else {
			          	$this->session->sets('error_msg','Pages not Deleted.');
			          	$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');    
		        	}                
		      	}else {
		        	$this->session->sets('error_msg','Pages not Deleted.');
		        	$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');  
		      	}
	    	} catch(Exception $e)  {
	      		$data = implode('~',$_POST);
	      		$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.$data,'error_logs',$e->getMessage(),'ERR');
	    	}
	  	}

	}