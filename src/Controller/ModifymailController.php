<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;

class ModifymailController extends AbstractController
{
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/modifymail", name="modifymail", methods={"GET"})
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }

        return $this->render('modifymail/index.html.twig', [
            'controller_name' => 'ModifymailController',
            'error' => null
        ]);
    }

     /**
     * @Route("/modifymail",  methods={"POST"})
     */
    public function post(Request $request)
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }
        
        $email = $request->request->get('email');
        $error = $this->userManager->tryUpdateEmail($email, $this->getDoctrine());

        if ($error != null ) {
            return $this->render('modifymail/index.html.twig', [
                'controller_name' => 'ModifymailController',
                'error' => $error
            ]);
        }

        return $this->redirectToRoute('profile');
    }
}
