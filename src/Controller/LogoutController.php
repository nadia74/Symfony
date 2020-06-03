<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;

class LogoutController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;    
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function index()
    {
        $this->userManager->logout();
        
        return $this->render('logout/index.html.twig', [
            'controller_name' => 'LogoutController',
        ]);
    }

    /*public function get($url)
    {
        session_start();
        session_destroy();        
        $this->render('viewLogout.twig', []);
    }*/
}
