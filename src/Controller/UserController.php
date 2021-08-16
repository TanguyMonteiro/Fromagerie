<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(Request $requete , EntityManagerInterface $manager , UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class , $user);
        $form->handleRequest($requete);
        if($form->isSubmitted()){

            $hashedPassword = $hasher->hashPassword($user , $user->getPassword());
            $user->setPassword($hashedPassword);

            $manager->persist($user);
            $manager->flush();

        }
        return $this->render('user/index.html.twig', [
            'formulaire' => $form->createView()
        ]);


    }

    /**
     * @Route("/login" , name="login")
     */
    public function login()
    {
        return $this->render('user/login.html.twig');
    }
    /**
     *
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        return  $this->redirectToRoute('login');
    }
}
