<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $datas=["PHP","ECONOMETRIE","DATAMINING","STATISTIQUE"];
        for ($i=0; $i < count($datas); $i++) { 
            $module=new Module();
            $module->setLibelle($datas[$i]);
            $this->addReference("Module".$i,$module);
            $manager->persist($module);
        }
        $manager->flush();
    }
}
