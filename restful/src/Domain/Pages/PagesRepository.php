<?php
namespace App\Domain\Pages;
use PDO;
/** 
* Repository.
*/
class PagesRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
  public function addPage($data){ 
    try {
        
        extract($data);

        $sql = "INSERT INTO ".DB_PREFIX."pages (page_title, page_description, meta_title, page_description2, page_status, banner_image,page_type,page_description1) 
                VALUES(:page_title, :page_description, :meta_title, :page_description2, :page_status, :banner_image,:page_type,:page_description1)";
       
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(":page_title", $page_title);
        $stmt->bindParam(":page_description", $page_description);  
        $stmt->bindParam(":meta_title", $meta_title); 
        $stmt->bindParam(":page_description2", $page_description2); 
         $stmt->bindParam(":page_description1", $page_description1);  
        $stmt->bindParam(":page_status", $page_status); 
        $stmt->bindParam(":banner_image", $banner_image);   
       $stmt->bindParam(":page_type",$page_type);
   
        $stmt->execute();
        $page_id = $this->connection->lastInsertId();

        if($page_id > 0) {
            $status = array(
                'status' => "200",
                'message' => "Success", 
                'page_id' => $page_id
            ); 
        } else {
            $status = array(
                'status' => "204",
                'message' => "No Data Found"
            );
        }
        return $status;

    } catch(PDOException $e) {
        $status = array(
            'status' => "500",
            'message' => $e->getMessage()
        );
        return $status;
    }
}

  
  public function getAllPages($data){ 
    try{
      extract($data);
    
      $sql = "SELECT * FROM ".DB_PREFIX."pages where page_status  != '9' and page_type = :page_type";

      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":page_type",$page_type);
      $stmt->execute();
      $pages = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($pages)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $pages
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
      $sql = "SELECT * FROM ".DB_PREFIX."pages where page_id = :page_id";
      $page_status = '0';
      $stmt = $this->connection->prepare($sql);

      $stmt->bindParam(":page_id",$page_id);
      $stmt->execute();
      $pages = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($pages)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $pages
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

  public function updatePage($data){
    try{
      extract($data);
      
      $sql = "UPDATE ".DB_PREFIX."pages SET page_title = :page_title, page_description = :page_description,page_description1 = :page_description1, banner_image = :banner_image, meta_title = :meta_title, page_description2 =:page_description2,page_status = :page_status,page_type=:page_type WHERE page_id = :page_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":page_id",$page_id);
      $stmt->bindParam(":page_title",$page_title);
      $stmt->bindParam(":page_description",$page_description);
      $stmt->bindParam(":page_description1",$page_description1); 
      $stmt->bindParam(":banner_image",$banner_image); 
      $stmt->bindParam(":meta_title",$meta_title); 
      $stmt->bindParam(":page_description2",$page_description2); 
      $stmt->bindParam(":page_type",$page_type);
      $stmt->bindParam(":page_status",$page_status);
            $res = $stmt->execute();
      
      if($res) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $res
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
   
  public function deletePage($data){
    try{
      extract($data);
      $sql = "UPDATE ".DB_PREFIX."pages SET  page_status = '9' WHERE page_id = :page_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":page_id",$page_id);  
   
      $res = $stmt->execute();
      
      if($res) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $res
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

  