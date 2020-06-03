<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;

class ModifyprofileController extends AbstractController
{
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/modifyprofile", name="modifyprofile",  methods={"GET"})
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }

        return $this->render('modifyprofile/index.html.twig', [
            'controller_name' => 'ModifyprofileController',
        ]);
    }

     /**
     * @Route("/modifyprofile",  methods={"POST"})
     */
    public function post(Request $request)
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }
        
        $username = $request->request->get('username');
        $this->userManager->updateUserName($username, $this->getDoctrine());
        return $this->redirectToRoute('profile');
    }
}
