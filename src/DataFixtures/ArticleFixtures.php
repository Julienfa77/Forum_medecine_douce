<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use \Datetime;
use App\Entity\User;
use App\Entity\Article;
use App\DataFixtures\UserFixtures;


class ArticleFixtures extends Fixture implements DependentFixtureInterface
{

  const ARTICLE_AYURVEDA = 'ayurveda';
  const ARTICLE_YOGA = 'yoga';
  const ARTICLE_THYM = 'thym';
  const ARTICLE_EAU = 'eau';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        //
        $article1 = new Article();
        $article1->setDateCreation(new datetime('now'));
        $article1->setTitre('La réussite de l\'ayurveda');
        $article1->setContenu('contenu de la réussite bla blab lbalb lba');
        $article1->setImageLink('images/ayurveda.jpg');
        $article1->setAuteur($this->getReference(UserFixtures::USER_USER1));
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setDateCreation(new datetime('now'));
        $article2->setTitre('Le yoga libérateur');
        $article2->setContenu('contenu de Le yoga libérateur bla blab lbalb lba');
        $article2->setImageLink('images/yoga.jpg');
        $article2->setAuteur($this->getReference(UserFixtures::USER_USER1));
        $manager->persist($article2);

        $article3 = new Article();
        $article3->setDateCreation(new datetime('now'));
        $article3->setTitre('Le thym à travers les siècles de médecine');
        $article3->setContenu('contenu de Le thym à travers les siècles de médecine bla blab lbalb lba');
        $article3->setImageLink('images/thym.jpg');
        $article3->setAuteur($this->getReference(UserFixtures::USER_USER1));
        $manager->persist($article3);

        $article4 = new Article();
        $article4->setDateCreation(new datetime('now'));
        $article4->setTitre('L\'eau dans la naturophatie');
        $article4->setContenu('contenu L\'eau dans la naturophatie bla blab lbalb lba');
        $article4->setImageLink('images/eau.jpg');
        $article4->setAuteur($this->getReference(UserFixtures::USER_USER1));
        $manager->persist($article4);

        $this->addReference(self::ARTICLE_AYURVEDA, $article1);
        $this->addReference(self::ARTICLE_YOGA, $article2);
        $this->addReference(self::ARTICLE_THYM, $article3);
        $this->addReference(self::ARTICLE_EAU, $article4);

        $manager->flush();
    }

    /**
     *  @return array
     */
    public function getDependencies()
    {
      return [
        UserFixtures::class,
      ];
    }
}
