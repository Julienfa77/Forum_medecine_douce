<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture
{
    const CATEGORIES_REF = array(
       'PLANTES' =>'Plantes',
       'CUISINE' => 'Cuisine Du Monde',
       'HUILES'  =>'Les huiles',
       'HERBES' => 'Herbes',
       'DISCIPLINE'=> 'Discipline',
       'PRODUIT' => 'Produit de la maison',
        'BIEN_ETRE' => 'Bien-être',
       'MUSIQUE' => 'Musique'
    );

    public function load(ObjectManager $manager)
    {
        foreach(CategorieFixtures::CATEGORIES_REF as $catRef => $catName){
              $categorie1 = new Categorie();
              $categorie1->setName($catName);
              $manager->persist($categorie1);
              $manager->flush();
              $this->addReference($catRef, $categorie1);
        }
    }
}
