<?php

namespace App\Controller;

use App\Entity\Liste;
use App\Entity\User;
use App\Entity\UserListeRelationship;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListsMoviesController extends AbstractController
{
    private $userManager;

    //initialiser l'attribut dans le constructeur
    public function __construct(UserManager $usermanager)
    {
        $this->userManager = $usermanager;
    }

    /**
     * @Route("/lists/movies", name="lists_movies")
     */
    public function index()
    {
        if ($this->userManager->getLoggedUser() == null) 
        {
            return $this->redirectToRoute('login');
        }

        else {

        $repo = $this->getDoctrine()->getRepository(Liste::class); 
        $listes = $repo->findAll();

        return $this->render('lists_movies/index.html.twig', [
            'controller_name' => 'ListsMoviesController',
            'listes' => $listes
            ]); 
        }
    }

    /**
    * @Route("/lists/movies/new", name="newlist")
    * @Route("/lists/movies/{id}/edit", name="editlist")
    */

    public function createEditList(Liste $list = null, Request $request) {
    $repoLists = $this->getDoctrine()->getRepository(Liste::class);   
        if(!$list) {
            $list = new Liste();
        }

        $form = $this->createFormBuilder($list)
                    ->add('listename')
                    ->add('description')
                    ->add('liste_favorite')
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($list);
            $manager->flush();

            return $this->redirectToRoute('lists_movies');
        } 

        return $this->render('lists_movies/listcreate.html.twig', [
            'formList' => $form->createView(),
            'editMode' => $list->getId() !== null
        ]);
    }

    /**
    * @Route("/deletelist/{id}", name="deletelist")
    */

    public function DeleteList($id) {
        $repo = $this->getDoctrine()->getRepository(Liste::class);

        $liste = $repo->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($liste);
        $manager->flush();
        return $this->redirectToRoute('lists_movies');
    }

    public function shareList() {

    }

    /**
    * @Route("/liste/{id}", name="showmylists")
    */

    /*public function showListes($id) {

    $user = $this->getDoctrine()
        ->getRepository(User::class)
        ->find($id);

    $listes = $user->getListes();

    return $this->render('lists_movies/index.html.twig', [
            'user' => $user,
            'listes' => $listes
        ]);
    }*/
}

