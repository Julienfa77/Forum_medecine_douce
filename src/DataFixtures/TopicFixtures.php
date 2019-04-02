<?php

namespace App\DataFixtures;

use App\Entity\Topic;
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
        // $product = new Product();
        // $manager->persist($product);

       $topic1 = new Topic();
       $topic1->setTitre('topic1')
        ->setCategorie($this->getReference(CategorieFixtures::CATEGORIE_VACCINS));
       $manager->persist($topic1);

        $topic2 = new Topic();
        $topic2->setTitre('topic2')
        ->setCategorie($this->getReference(CategorieFixtures::CATEGORIE_MEDICAMENTS));
        $manager->persist($topic2);

        $topic3 = new Topic();
        $topic3->setTitre('topic3')
        ->setCategorie($this->getReference(CategorieFixtures::CATEGORIE_PHARMACIE));
        $manager->persist($topic3);

        $topic4 = new Topic();
        $topic4->setTitre('topic4')
        ->setCategorie($this->getReference(CategorieFixtures::CATEGORIE_ORDONNANCE));
        $manager->persist($topic4);

        $topic5 = new Topic();
        $topic5->setTitre('topic5')
        ->setCategorie($this->getReference(CategorieFixtures::CATEGORIE_PIQURE));
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
      ];
    }
}
