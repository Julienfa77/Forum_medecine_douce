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
        $article1->setContenu('En sanskrit, " Ayur " signifie la vie, et " Veda " la science ou la connaissance. Créée par les Rishis, les Sages de l’Inde classique, l’"Ayurveda "peut donc se traduire littéralement par " Connaissance de la vie ou de la longévité ".
              L’intelligence de la vie : Prana
              Dans ce contexte, la vie est étudiée dans sa dynamique perpétuelle, sa capacité à transformer et à créer, son intelligence. Cette intelligence de la vie est Prana, ou l’énergie fondamentale, source de toute manifestation de la matière dans la création. Prana est aussi la force à l’œuvre dans le processus de guérison.
              LA SCIENCE DES RISHIS
              L’Ayurveda, science millénaire développée dans l’Inde classique, a été élaborée par des Rishis ou Sages, à travers une fabuleuse Odyssée d’expériences menées pour mieux comprendre le fonctionnement de la nature, et à travers elle, de tous les êtres vivants.
              L’HARMONIE UNIVERSELLE
              Si les principes de base de l’Ayurveda n’ont jamais changé à travers les siècles, malgré tous les efforts pour en faire taire sa puissance, c’est parce qu’ils proviennent des lois universelles de la Nature, qui sont éternellement vraies. Il s’agit donc de la connaissance globale des moyens de vivre notre vie quotidienne en harmonie avec la nature et les principes cosmiques.
              L’AYURVEDA, MÉDECINE ET ART DE VIVRE
              La particularité de l’Ayurveda est celle d’une médecine holistique. Mais bien plus qu’un système de santé, c’est un art de vivre complet qui prend en compte tous les aspects de l’être humain, de ceux, plus abstraits et transcendantaux, de l’existence, jusqu’à ceux, plus matériels et concrets, du corps physique. C’est un moyen de comprendre sa vraie nature en profondeur
              DES TECHNIQUES VARIÉES
              L’Ayurveda propose des outils pratiques et concrets, ancrés dans le quotidien, tels que le régime alimentaire, la détoxification et différentes techniques de purification, le yoga et les exercices respiratoires, la méditation, l’utilisation de remèdes à base de plantes ou de minéraux, le massage ainsi que d’autres méthodes de guérison holistiques.');
        $article1->setImageLink('images/ayurveda.png');
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
