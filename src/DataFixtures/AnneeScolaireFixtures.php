<?php

namespace App\DataFixtures;

use App\Entity\AnneeScolaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class AnneeScolaireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $datas=["2018","2019","2020","2021"];
        for ($i=0; $i < count($datas); $i++) { 
        
            $anne=new AnneeScolaire();
            $anne->setLibelle($datas[$i]."-".$datas[$i+1]);
            $this->addReference("Annee".$i,$anne->getLibelle());
            $manager->persist($anne);

        }

        $manager->flush();
    }
}
