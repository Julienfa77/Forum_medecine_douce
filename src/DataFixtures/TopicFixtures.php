<?php

namespace App\DataFixtures;

use App\Entity\Topic;
use App\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TopicFixtures extends Fixture implements DependentFixtureInterface
{
    const TOPIC_TOPIC1 = 'topic1';
    const TOPIC_TOPIC2 = 'topic2';
    const TOPIC_TOPIC3 = 'topic3';
    const TOPIC_TOPIC4 = 'topic4';
    const TOPIC_TOPIC5 = 'topic5';

    public function load(ObjectManager $manager)
    {

       $topic1 = new Topic();
       $topic1->setTitre('PLANTES')
        ->setCategorie($this->getReference(array_keys(CategorieFixtures::CATEGORIES_REF)[0]))
        ->setUser($this->getReference(UserFixtures::USER_USER2));
       $manager->persist($topic1);

        $topic2 = new Topic();
        $topic2->setTitre('PLANES')
          ->setCategorie($this->getReference(array_keys(CategorieFixtures::CATEGORIES_REF)[0]))
          ->setUser($this->getReference(UserFixtures::USER_USER5));
        $manager->persist($topic2);

        $topic3 = new Topic();
        $topic3->setTitre('HERBES')
        ->setCategorie($this->getReference(array_keys(CategorieFixtures::CATEGORIES_REF)[3]))
        ->setUser($this->getReference(UserFixtures::USER_USER5));
        $manager->persist($topic3);

        $topic4 = new Topic();
        $topic4->setTitre('MUSIQUE')
        ->setCategorie($this->getReference(array_keys(CategorieFixtures::CATEGORIES_REF)[7]))
        ->setUser($this->getReference(UserFixtures::USER_USER3));
        $manager->persist($topic4);

        $topic5 = new Topic();
        $topic5->setTitre('CUISINE')
        ->setCategorie($this->getReference(array_keys(CategorieFixtures::CATEGORIES_REF)[1]))
        ->setUser($this->getReference(UserFixtures::USER_USER2));
        $manager->persist($topic5);

        $manager->flush();

        $this->addReference(self::TOPIC_TOPIC1, $topic1);
        $this->addReference(self::TOPIC_TOPIC2, $topic2);
        $this->addReference(self::TOPIC_TOPIC3, $topic3);
        $this->addReference(self::TOPIC_TOPIC4, $topic4);
        $this->addReference(self::TOPIC_TOPIC5, $topic5);

    }

    /**
     *  @return array
     */
    public function getDependencies()
    {
      return [
        CategorieFixtures::class,
        UserFixtures::class,
      ];
    }
}
