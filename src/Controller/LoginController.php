<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
        //Créer l'attribut
        private $userManager;

        //initialiser l'attribut dans le constructeur
        public function __construct(UserManager $userm)
        {
            $this->usermanager = $userm;
        }




    /**
     * @Route("/login", name="login", methods={"GET"})
     */
    public function index()
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    /**
     * @Route("/login", methods={"POST"})
     */
    public function post(Request $request)
    {
    /*    $users = $this->getDoctrine()
        ->getRepository(User::class)
        ->findAll();
        dump($users);*/

        $email =  $request->request->get("email");
        $password =  $request->request->get("password");
        //dump($name , $password);

        if($this->usermanager->trylogin($email, $password, $this->getDoctrine())){
            return $this->redirectToRoute('movies');

        }

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
        
               /* 

        $email =  $regist["email"];
        $password =  $regist["password"];
        
        $errors =[];
        
        
        
        if ($email == "" || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email) || $password == ""){
            $errors ['erreurlogin'] = 'Invalid username and/or password';

        }

        
        
        

        if (count($errors) != 0){
            $this->render('viewLogin.twig',$errors);

        }

        else {

            $this->_userManager = new UserManager();
            $user = $this->_userManager->login($email, $password);
            if ($user){
                //var_dump($user);
                Session::getInstance()->set("groupofloggeduser", $user["group"]);
                Session::getInstance()->set("name", $user["username"]);

                if ($user["group"]=="admin"){
                    header("Location:admin");           
                    echo "vous etes loggé en tant qu'administrateur"; 
                }
                else{
                    header("Location:acceuil");           
                    echo "vous etes loggé en tant que rédacteur"; 
                }

            }

            else{
                $errors ['erreurlogin'] = 'Invalid username and/or password';
                $this->render('viewLogin.twig',$errors);
*/
            }
}
