<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->passwordEncoder = $passwordEncoder;

    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        //
        $user1 = new User();
        $user->setName()
          ->setRoles(['ROLE_ADMIN'])
          ->setEmail('mama92@outlook.fr')
          ->setPassword($this->passwordEncoder->encodePassword($user1,'password'));

          $manager->persist($user1);

          $user2 = new User();
          $user->setName()
            ->setRoles(['ROLE_USER'])
            ->setEmail('mama@outlook.fr')
            ->setPassword($this->passwordEncoder->encodePassword($user,'password'));

            $manager->persist($user2);

            //
            $user3 = new User();
            $user->setName()
              ->setRoles(['ROLE_ADMIN'])
              ->setEmail('mama922@outlook.fr')
              ->setPassword($this->passwordEncoder->encodePassword($user3,'password'));

              $manager->persist($user3);

              //
              $user4 = new User();
              $user->setName()
                ->setRoles(['ROLE_ADMIN'])
                ->setEmail('mama92@outlook.fr')
                ->setPassword($this->passwordEncoder->encodePassword($user4,'password'));

                $manager->persist($user4);


                //
                $user5 = new User();
                $user->setName()
                  ->setRoles(['ROLE_ADMIN'])
                  ->setEmail('mama92@outlook.fr')
                  ->setPassword($this->passwordEncoder->encodePassword($user5,'password'));

                  $manager->persist($user5);

        $manager->flush();
    }
}
