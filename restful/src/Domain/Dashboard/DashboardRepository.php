<?php
namespace App\Domain\Dashboard;
use PDO;
/** 
* Repository.
*/
class DashboardRepository
{ 
  /**
   * @var PDO The database connection
   */
  private $connection;
  /**  
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
  
 
  
  public function getDashboardPages($data){ 
    try{
      extract($data);      
      $sql = "SELECT * FROM ".DB_PREFIX."pages where page_status ='0' and page_type = 'home' ORDER BY page_id DESC ";
      $stmt = $this->connection->prepare($sql);  
       
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
  

  public function getDashboardCount($data){ 
    try{
      extract($data);     
      $res = []; 
      $sql = "SELECT count(1) AS page_cnt FROM ".DB_PREFIX."pages where page_status ='0' ";
      $stmt = $this->connection->prepare($sql);        
      $stmt->execute();
      $res['pages_cnt'] = $stmt->fetch(PDO::FETCH_OBJ)->page_cnt;

      

      if(!empty($res)) {
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

  