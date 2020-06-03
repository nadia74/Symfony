<?php

namespace App\Manager;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserManager {
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;    
    }

    public function trylogin($email, $password, $doctrine){
        $passhash = md5($password);
        $repository = $doctrine->getRepository(User::class);
       
        $user = $repository->findOneBy(['email' => $email, 'password' => $passhash]);
        if ($user != null) {
            $this->session->set('userLogged', $user);
        }

        return $user != null;        
   }

   public function getLoggedUser() {
        return $this->session->get('userLogged');
   }

   public function logout() {
       $this->session->clear();
   }

   public function createuser($name, $email, $password, $doctrine){

    if ($this->emailExists($email, $doctrine)) {
        return "L'email est deja utilise.";
    }

    $passhash = md5($password);
    $entityManager = $doctrine->getManager();

    $user = new User();
    $user->setName($name);
    $user->setEmail($email);
    $user->setPassword($passhash);
    $user->setBanned(false);
    $user->setAdmin(false);

    // tell Doctrine you want to (eventually) save the Product (no queries yet)
    $entityManager->persist($user);

    // actually executes the queries (i.e. the INSERT query)
    $entityManager->flush();

    return null;
   }

    public function deleteCurrentUser($doctrine) {
        $user = $this->getLoggedUser();

        if ($user != null)
        {
            $repository = $doctrine->getRepository(User::class);
            $userToRemove = $repository->findOneBy(['email' => $user->getEmail()]);
            if ($userToRemove != null)
            {
                $entityManager = $doctrine->getManager();
                $entityManager->remove($userToRemove);
                $entityManager->flush();
                $this->logout();
            }
        }
    }

    public function updateUserName($newName, $doctrine) {
        $loggedUser = $this->getLoggedUser();

        if ($loggedUser != null)
        {
            $repository = $doctrine->getRepository(User::class);
            $user = $repository->findOneBy(['email' => $loggedUser->getEmail()]);
            if ($user != null)
            {
                $user->setName($newName);
                $entityManager = $doctrine->getManager();
                $entityManager->flush();
                $this->session->set('userLogged', $user);
            }            
        }        
    }

    public function updatePassword($password, $doctrine) {
        $loggedUser = $this->getLoggedUser();

        if ($loggedUser != null)
        {
            $repository = $doctrine->getRepository(User::class);
            $user = $repository->findOneBy(['email' => $loggedUser->getEmail()]);
            if ($user != null)
            {
                $passhash = md5($password);
                $user->setPassword($passhash);
                $entityManager = $doctrine->getManager();
                $entityManager->flush();
                $this->session->set('userLogged', $user);
            }            
        }        
    }

    public function tryUpdateEmail($newEmail, $doctrine) {
        if ($this->emailExists($newEmail, $doctrine)) {
            return "L'email est deja utilise.";
        }

        $loggedUser = $this->getLoggedUser();

        if ($loggedUser != null)
        {
            $repository = $doctrine->getRepository(User::class);
            $user = $repository->findOneBy(['email' => $loggedUser->getEmail()]);
            if ($user != null)
            {
                $user->setEmail($newEmail);
                $entityManager = $doctrine->getManager();
                $entityManager->flush();
                $this->session->set('userLogged', $user);
            }            
        } 
        return null;       
    }

    private function emailExists($email, $doctrine) {
        $repository = $doctrine->getRepository(User::class);
       
        $user = $repository->findOneBy(['email' => $email]);
        return $user != null;
    }
    
}