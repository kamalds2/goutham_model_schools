<?php
namespace App\Domain\Gouthams;
use PDO;
/** 
* Repository.
*/
class GouthamsRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
   
  public function getAllMenus($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."header_menus where  menu_status = 'y' ORDER BY menu_position,menu_parentid ";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $menus = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($menus)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menus
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;    

    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }


  

  public function getAllFooterMenus($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."footer_menus where  menu_status = 'y' ORDER BY  menu_position,menu_parentid";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $menus = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($menus)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menus
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;    

    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }


  

public function sendEnquiry($data){ 
    try{
      extract($data);
      $sql = "INSERT INTO ".DB_PREFIX."enquires (name,email,mobile_no,subject,message) VALUES(:name,:email,:mobile_no,:subject,:message) ";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":name",$name);
      $stmt->bindParam(":email",$email);
      $stmt->bindParam(":mobile_no",$mobile_no);
      $stmt->bindParam(":subject",$subject);
 
      $stmt->bindParam(":message",$message);

      $stmt->execute();
      $enquiry_id = $this->connection->lastInsertId();
      if($enquiry_id > 0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $enquiry_id
        );
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

 



 
  public function getPageDetails($data){ 
    try{
      extract($data); 

      $sql = "SELECT * FROM `tbl_pages` WHERE page_type = :page_type and page_status = '0' ";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":page_type",$page_type); 
      $stmt->execute(); 
      $page = $stmt->fetchAll(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
        );
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

   
  public function getSettingsData($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM ".DB_PREFIX."settings WHERE settings_id = 1";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute(); 
      $modules = $stmt->fetch(PDO::FETCH_OBJ); 
      if(!empty($modules)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $modules
        );
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  } 

  public function getHomePageServices($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM tbl_services where service_status = 0";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute(); 
      $page = $stmt->fetchAll(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
        );
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

   public function getHomePageDetails($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM ".DB_PREFIX."pages where page_type=:page_type and page_status='0' ";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->bindParam(":page_type",$page_type);
      $stmt->execute(); 
      $page = $stmt->fetchAll(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
        );
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }
 

}

  