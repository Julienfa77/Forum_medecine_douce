<?php

namespace App\DataFixtures;

use App\Entity\Topic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TopicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

       $topic1 = new Topic();
       $topic1->setTitre('nom du topic');
       $manager->persist($topic1);


        $topic2 = new Topic();
        $topic2->setTitre('nom du topic');
        $manager->persist($topic2);

        $topic3 = new Topic();
        $topic3->setTitre('nom du topic');
        $manager->persist($topic3);

        $topic4 = new Topic();
        $topic4->setTitre('nom du topic');
        $manager->persist($topic4);

        $topic5 = new Topic();
        $topic5->setTitre('nom du topic');
        $manager->persist($topic5);


        $manager->flush();
    }
}
