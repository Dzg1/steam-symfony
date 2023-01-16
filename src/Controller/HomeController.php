<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GameRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    
    public function index(GameRepository $gameRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'games' => $gameRepository->findAll(),
        ]);
    }
}
