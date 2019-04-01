<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $emanager)
    {
        // $product = new Product();
        // $manager->persist($product);
         $message1 = new Message();
         $message1->setTitle('Premier message du Topic')
               ->setContent("Coucou, premier message de notre Forum medecine douce..");

              $manager->persist($message1);

          $message2 = new Message();
          $message2->setTitle('Deuxieme message du Topic')
                    ->setContent("Coucou, premier message de notre Forum medecine douce..");

              $manager->persist($message2);

          $message3 = new Message();
          $message3->setTitle('Troisieme message du Topic')
                     ->setContent("Coucou, premier message de notre Forum medecine douce..");

              $manager->persist($message3);

          $message4 = new Message();
          $message4->setTitle('Quatrieme message du Topic')
                    ->setContent("Coucou, premier message de notre Forum medecine douce..");

             $manager->persist($message4);

          $message5 = new Message();
          $message5->setTitle('Cinquieme message du Topic')
                   ->setContent("Coucou, premier message de notre Forum medecine douce..");

              $manager->persist($message5);

        $manager->flush();
    }
}
