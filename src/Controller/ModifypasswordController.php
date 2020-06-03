<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;

class ModifypasswordController extends AbstractController
{
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/modifypassword", name="modifypassword", methods={"GET"})
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }

        return $this->render('modifypassword/index.html.twig', [
            'controller_name' => 'ModifypasswordController',
        ]);
    }

      /**
     * @Route("/modifypassword",  methods={"POST"})
     */
    public function post(Request $request)
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }
        
        $password = $request->request->get('password');
        $this->userManager->updatePassword($password, $this->getDoctrine());        
        
        return $this->redirectToRoute('profile');
    }
}
