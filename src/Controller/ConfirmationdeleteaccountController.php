<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\UserManager;

class ConfirmationdeleteaccountController extends AbstractController
{
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/confirmationdeleteaccount", name="confirmationdeleteaccount")
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }
        $this->userManager->deleteCurrentUser($this->getDoctrine());

        return $this->render('confirmationdeleteaccount/index.html.twig', [
            'controller_name' => 'ConfirmationdeleteaccountController',
        ]);
    }
}
