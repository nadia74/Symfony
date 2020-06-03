<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Manager\UserManager;

class AdminController extends AbstractController {

    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/admin", name="admin")
     */
    
    public function index() {
        $user = $this->userManager->getLoggedUser();

        if ($user == null || $user->getAdmin() == false) 
        {
            return $this->redirectToRoute('login');
        }

        $repo = $this->getDoctrine()->getRepository(User::class); 
        $users = $repo->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'users' => $users
        ]);
    }

    /**
    * @Route("/admin/new", name="new")
    * @Route("/admin/{id}/edit", name="edit")
    */

    public function createEdit(User $user = null, Request $request) {
        
        if(!$user) {
            $user = new User();
        }

        $form = $this->createFormBuilder($user)
                    ->add('name')
                    ->add('email', EmailType::class)
                    ->add('password')
                    ->add('admin')
                    ->add('banned')
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('admin');
        } 

        return $this->render('admin/create.html.twig', [
            'formUser' => $form->createView(),
            'editMode' => $user->getId() !== null
        ]);
    }

    
    /**
    * @Route("/delete/{id}", name="delete")
    */

    public function DeleteUser($id) {
        $repo = $this->getDoctrine()->getRepository(User::class);

        $user = $repo->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('admin');
    }

    /**
    * @Route("/user/{id}/ban", name="ban")
      @param User $users
      @param Object Manager $manager
    */

    public function banUser($id, Request $request) {
        $repo = $this->getDoctrine()->getRepository(User::class);

        $user = $repo->find($id);
        $user->setBanned(1);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute('admin');
        }
           /*elseif ($banned == true) {
                $user->setBanned(0);
                $manager->persist($user);
                $manager->flush();
                return $this->redirectToRoute('admin');
                }
            }*/
    
    /**
    * @Route("/user/{id}/unban", name="unban")
      @param User $users
      @param Object Manager $manager
    */

    public function unbanUser($id, Request $request) {
        $repo = $this->getDoctrine()->getRepository(User::class);

        $user = $repo->find($id);
        $user->setBanned(0);
        $manager = $this->getDoctrine()->getManager();        
        $manager->persist($user);
        $manager->flush();
        return $this->redirectToRoute('admin');
    }

    /**
    * @Route("/admin/{id}/show", name="showprofile")
    */

    public function show(User $user) : Response {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $user = $repo->find($user); 

        return $this->render('admin/show.html.twig', [
            'user' => $user
        ]);
    }

}


