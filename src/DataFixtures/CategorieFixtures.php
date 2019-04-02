<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    const CATEGORIE_VACCINS = 'vaccins';
    const CATEGORIE_MEDICAMENTS = 'medicaments';
    const CATEGORIE_PHARMACIE = 'pharmacie';
    const CATEGORIE_ORDONNANCE = 'ordonnance';
    const CATEGORIE_PIQURE = 'piqure';

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $categorie1 = new Categorie();
          $categorie1->setName('Vaccins');
            $manager->persist($categorie1);

        $categorie2 = new Categorie();
          $categorie2->setName('Medicaments');
            $manager->persist($categorie2);

        $categorie3 = new Categorie();
          $categorie3->setName('Pharmacie');
            $manager->persist($categorie3);

        $categorie4 = new Categorie();
          $categorie4->setName('ordonnance');
            $manager->persist($categorie4);

        $categorie5 = new Categorie();
          $categorie5->setName('Piqure');
            $manager->persist($categorie5);

        $manager->flush();

        $this->addReference(self::CATEGORIE_VACCINS, $categorie1);
        $this->addReference(self::CATEGORIE_MEDICAMENTS, $categorie2);
        $this->addReference(self::CATEGORIE_PHARMACIE, $categorie3);
        $this->addReference(self::CATEGORIE_ORDONNANCE, $categorie4);
        $this->addReference(self::CATEGORIE_PIQURE, $categorie5);
    }
}
