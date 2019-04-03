<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\UserType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class DefaultController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/", name="register_index", methods={"GET"})
     */
    public function register(
      Request $request,
      EntityManagerInterface $manager,
      UserPasswordEncoderInterface $encoder
    ) {
        $user = new User();
        $form = $this->createFormBuilder($user)
          ->add('email', EmailType::class)
          ->add('password',PasswordType::class)
          ->add('name', TextType::class)
          ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $user->setRoles(['ROLE_USER']);

          $encoded = $encoder->encodePassword($user, $form['password']->getData());
          $user->setPassword($encoded);

          $manager->persist($user);
          $manager->flush();
          return $this->redirectToRoute('home');
        }

        return $this->render('default/register.html.twig', [
          'register_form' => $form->createView()
        ]);
    }
}
