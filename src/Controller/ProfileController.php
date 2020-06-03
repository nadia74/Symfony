<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;    
    }

    /**
     * @Route("/profile", name="profile", methods={"GET"})
     */
    public function index()
    {
        $user = $this->userManager->getLoggedUser();
        if ($user == null) 
        {
            return $this->redirectToRoute('login');
        }

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'username' => $user->getName(),
            'email' => $user->getEmail()
        ]);
    } 
}
