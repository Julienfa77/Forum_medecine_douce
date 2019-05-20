<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    const USER_USER1 = 'user1';
    const USER_USER2 = 'user2';
    const USER_USER3 = 'user3';
    const USER_USER4 = 'user4';
    const USER_USER5 = 'user5';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->passwordEncoder = $passwordEncoder;

    }
    public function load(ObjectManager $manager)
    {

        $user1 = new User();
        $user1->setName('Paul')
          ->setRoles(['ROLE_ADMIN'])
          ->setEmail('mama90@outlook.fr')
          ->setPassword($this->passwordEncoder->encodePassword($user1,'password'))
          ->setImageLink('images/pp1.png');

          $manager->persist($user1);

          $user2 = new User();
          $user2->setName('Robert')
            ->setRoles(['ROLE_USER'])
            ->setEmail('mama91@outlook.fr')
            ->setPassword($this->passwordEncoder->encodePassword($user2,'password'))
            ->setImageLink('images/pp2.png');
            $manager->persist($user2);

            //
            $user3 = new User();
            $user3->setName('Anne')
              ->setRoles(['ROLE_USER'])
              ->setEmail('mama93@outlook.fr')
              ->setPassword($this->passwordEncoder->encodePassword($user3,'password'))
              ->setImageLink('images/pp3.png');

              $manager->persist($user3);

              //
              $user4 = new User();
              $user4->setName('Jule')
                ->setRoles(['ROLE_USER'])
                ->setEmail('mama94@outlook.fr')
                ->setPassword($this->passwordEncoder->encodePassword($user4,'password'))
                ->setImageLink('images/pp4.png');
                $manager->persist($user4);


                //
                $user5 = new User();
                $user5->setName('Louis')
                  ->setRoles(['ROLE_USER'])
                  ->setEmail('mama95@outlook.fr')
                  ->setPassword($this->passwordEncoder->encodePassword($user5,'password'))
                  ->setImageLink('images/pp5.png');
                  $manager->persist($user5);

        $manager->flush();

        $this->addReference(self::USER_USER1, $user1);
        $this->addReference(self::USER_USER2, $user2);
        $this->addReference(self::USER_USER3, $user3);
        $this->addReference(self::USER_USER4, $user4);
        $this->addReference(self::USER_USER5, $user5);

    }
}
