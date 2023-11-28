<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class GradeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $datas=["INGENIEUR","DOCTEUR","PROFESSEUR"];

        for ($i=0; $i < count($datas); $i++) { 
            $grade=new Grade();
            $grade->setLibelle($datas[$i]);
            $manager->persist($grade);
            $this->addReference("Grade".$i,$grade);
        }
        $manager->flush();
    }
}
