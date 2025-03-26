<?php

namespace App\Action\Gouthams;

use App\Domain\Gouthams\Gouthams;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetHomePageDetails
{

  private $travelbunny;
  public function __construct(Gouthams $Gouthams)
  {
    $this->Gouthams = $Gouthams; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    { 
       $data = $request->getBody();
      $data =(array) json_decode($data);  
      $Gouthams = $this->Gouthams->getHomePageDetails($data);
      $response->getBody()->write((string)json_encode($Gouthams));
      return $response->withHeader('Content-Type','application/json');
    }
}