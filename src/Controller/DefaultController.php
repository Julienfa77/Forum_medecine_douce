<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Topic;
use App\Entity\User;
use App\Form\TopicType;
use App\Repository\CategorieRepository;
use App\Repository\ArticleRepository;
use App\Repository\TopicRepository;
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
    public function index(ArticleRepository $articleRepository,
                          CategorieRepository $categoryRepository,
                          TopicRepository $topicRepository )
    {
       $articles=$articleRepository->findAll();

        $categories=$categoryRepository->findAll();


        $topics=$topicRepository->findAll();


        return $this->render('default/index.html.twig',[
            'articles'=>$articles,
            'topics'=>$topics,
            'categories'=>$categories
        ]);
    }

    /**
     * @Route("forum/{id}", name="forum_show")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function forum(TopicRepository $repository,$id)
    {
        $topics=$repository->findTopicWithCategorieId($id);
        return $this->render('default/forum.html.twig',[
            'topics'=>$topics,
            'categorie_id'=>$id,

        ]);
    }

    /**
     * @Route("/forum/{id}/create_topic",name="forum_create_topic")
     * @param Request $request
     * @param $id
     */
    public function forumCreateTopic(
        Request $request,
        $id,
        CategorieRepository $repository,
        EntityManagerInterface $manager
        ) {
        $categorie=$repository->find($id);
        $topic=new Topic();

        $topic->setCategorie($categorie);
        $form=$this->createForm(TopicType::class,$topic);

        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()){
            $topic->setUser( $this->getUser());
            $manager->persist($topic);
            $manager->flush();

            return $this->redirectToRoute('forum_topic_show', [
                'id'=>$topic->getId()
            ]);
        }
        return $this->render('default/create_topic.html.twig',[
            'form_topic'=>$form->createView()

        ]);
    }

    /**
     * @Route ("/forum/{id}/show_topic", name="forum_topic_show")
     * @param Topic $topic
     */
    public function topic(Topic $topic)
    {
         return $this->render('default/show_topic.html.twig', [
             'topic'=>$topic
         ]);
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
