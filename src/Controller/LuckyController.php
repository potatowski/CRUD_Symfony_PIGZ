<?php
  #src/Controller/LuckyController.php
  namespace App\Controller;

use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\Response;
  #use Symfony\Flex\Response;


  class LuckyController extends AbstractController
  {
    /**
     * Configurando a rota
     * @Route("/aleatorio", name="aleatorio")
     */
    public function number()
    {
      $num = random_int(0,100);

      return $this->render('numeroAleatorio.html.twig', [
        'numero' => $num,
      ]);
      
    }
  }