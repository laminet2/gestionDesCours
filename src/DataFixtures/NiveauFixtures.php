<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class NiveauFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $datas=["L1","L2","L3"];

        for($i=0;$i<count($datas);$i++){
            $niveau =new Niveau();
            $niveau->setLibelle($datas[$i]);
            $this->addReference("Niveau".$i,$niveau);
            $manager->persist($niveau);
        }
        
        $manager->flush();
    }
}
