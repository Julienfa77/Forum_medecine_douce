<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Message;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{



    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        //  $message1 = new Message();
        //  $message1->setTitre('Premier message du Topic')
        //        ->setContenu("Coucou, premier message de notre Forum medecine douce..")
        //        ->setUser($this->getReference(UserFixtures::USER_USER1))
        //        ->setTopic($this->getReference(TopicFixtures::TOPIC_TOPIC1));
        //
        //       $manager->persist($message1);
        //
        //
        //   $message2 = new Message();
        //   $message2->setTitre('Deuxieme message du Topic')
        //             ->setContenu("Coucou, deuxieme message de notre Forum medecine douce..")
        //             ->setUser($this->getReference(UserFixtures::USER_USER2))
        //             ->setTopic($this->getReference(TopicFixtures::TOPIC_TOPIC2));
        //       $manager->persist($message2);
        //
        //
        //   $message3 = new Message();
        //   $message3->setTitre('Troisieme message du Topic')
        //              ->setContenu("Coucou, troisieme message de notre Forum medecine douce..")
        //              ->setUser($this->getReference(UserFixtures::USER_USER3))
        //              ->setTopic($this->getReference(TopicFixtures::TOPIC_TOPIC3));
        //       $manager->persist($message3);
        //
        //
        //   $message4 = new Message();
        //   $message4->setTitre('Quatrieme message du Topic')
        //             ->setContenu("Coucou, quatrieme message de notre Forum medecine douce..")
        //             ->setUser($this->getReference(UserFixtures::USER_USER4))
        //             ->setTopic($this->getReference(TopicFixtures::TOPIC_TOPIC4));
        //      $manager->persist($message4);
        //
        //
        //   $message5 = new Message();
        //
        //   $message5->setTitre('Cinquieme message du Topic')
        //            ->setContenu("Coucou, cinquieme message de notre Forum medecine douce..")
        //            ->setUser($this->getReference(UserFixtures::USER_USER5))
        //            ->setTopic($this->getReference(TopicFixtures::TOPIC_TOPIC5));
        //       $manager->persist($message5);
        //
        // $manager->flush();
    }

    /**
     *  @return array
     */
    public function getDependencies()
    {
      return [
        UserFixtures::class,
        TopicFixtures::class,
      ];
    }
}
