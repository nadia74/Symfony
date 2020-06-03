<?php

namespace App\Controller;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class RegisterController extends AbstractController
{
    //Créer l'attribut
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }



    /**
     * @Route("/register", name="register", methods={"GET"})
     */
    public function index()
    {
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'erreur'=> null
        ]);
    }

    /**
     * @Route("/register", methods={"POST"})
     */
    public function post(Request $request)
    {

        $name =  $request->request->get("username");
        $password =  $request->request->get("password");
        $email =  $request->request->get("email");

        $error = $this->userManager->createuser($name, $email, $password, $this->getDoctrine());
                           
        if ($error != null) {
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'erreur'=> $error,
        ]);
        }

        return $this->redirectToRoute('login');
    }
}
