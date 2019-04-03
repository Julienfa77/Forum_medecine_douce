<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CategorieRepository;
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
    public function index(CategorieRepository $repository)
    {
        $categories=$repository->findAll();

        return $this->render('default/index.html.twig',[
            'categories'=>$categories
        ]);
    }

    /**
     * @Route("forum/{id}", name="forum_show")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function forum()
    {
        return $this->render('default/forum.html.twig');
    }

    /**
     * @Route("/register", name="register_index", methods={"GET", "POST"})
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
