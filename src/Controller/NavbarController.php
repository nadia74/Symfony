<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;

class NavbarController extends AbstractController
{

       //Créer l'attribut
       private $userManager;

       //initialiser l'attribut dans le constructeur
       public function __construct(UserManager $usermanager)
       {
           $this->userManager = $usermanager;
       }


    /**
     * @Route("/navbar", name="navbar")
     */
    public function index()
    {
        return $this->render('navbar/index.html.twig', [
            'controller_name' => 'NavbarController',
            'user' => $this->userManager->getLoggedUser()            
        ]);
    }


}
