<?php

namespace App\Action\Gouthams;

use App\Domain\Gouthams\Gouthams;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllFooterMenus
{

  private $Gouthams;
  public function __construct(Gouthams $Gouthams)
  {
    $this->Gouthams = $Gouthams; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    { 
       
      $Gouthams = $this->Gouthams->getAllFooterMenus($args);
      $response->getBody()->write((string)json_encode($Gouthams));
      return $response->withHeader('Content-Type','application/json');
    }
}