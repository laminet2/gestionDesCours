<?php

namespace App\DataFixtures;

use App\Entity\Filiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class FiliereFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $datas=["MAIE","CDSD","GLRS","CPD"];
        for ($i=0; $i < count($datas); $i++) {
            $filiere= new Filiere();
            $filiere->setLibelle($datas[$i]);
            $this->addReference("Filiere".$i,$filiere);
            $manager->persist($filiere);
        }
        $manager->flush();
    }
}
