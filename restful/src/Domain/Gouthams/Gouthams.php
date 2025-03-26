<?php
namespace App\Domain\Gouthams;

use App\Domain\Gouthams\GouthamsRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Gouthams
{ 
  /**
   * @var TravelBunnyRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param TravelBunnyRepository $repository The repository
   */
  public function __construct(GouthamsRepository $repository){
    $this->repository = $repository;
  }
 
   
  public function getAllMenus($data){
    $result = $this->repository->getAllMenus($data);
    return $result;
  }
   public function getAllFooterMenus($data){
    $result = $this->repository->getAllFooterMenus($data);
    
    return $result;
  }
  public function sendEnquiry($data){
    $result = $this->repository->sendEnquiry($data);
    return $result;
  }
 
 


  public function getPageDetails($data){
    $result = $this->repository->getPageDetails($data);
    return $result;
  }
  
  public function getModuleDetails($data){
    $result = $this->repository->getModuleDetails($data);
    return $result;
  }
  
  public function getSettingsData($data){
    $result = $this->repository->getSettingsData($data);
    return $result;
  }
  
  public function getHomePageDetails($data){
    $result = $this->repository->getHomePageDetails($data);
    return $result;
  }
 
}