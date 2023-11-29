<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Repository\ClasseRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class ClasseFixtures extends Fixture implements DependentFixtureInterface
{
    public ClasseRepository $classeRepository;

    public  function __construct(ClasseRepository $classeRepository){

        $this->classeRepository=$classeRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=0;$i<=10;$i++){
            $refNiveau=rand(0,2);
            $refFiliere=rand(0,3);

            $niveau=$this->getReference("Niveau".$refNiveau);
            $filiere=$this->getReference("Filiere".$refFiliere);
            $nameClasse=$filiere->getLibelle()."".$niveau->getLibelle();
            $result=$this->classeRepository->findOneby(["libelle"=>$nameClasse]);

            if($result==null){

                $annee=$this->getReference("Annee".rand(0,2));
                $classe=new Classe();
                
                $classe->setLibelle($nameClasse)
                ->setNiveau($niveau)
                ->setAnneeScolaire($annee)
                ->setFiliere($filiere);

                $manager->persist($classe);
            }else{
                $i--;
            }
        }

        $manager->flush();
    }
    public function  getDependencies(){
        return array(
                FiliereFixtures::class,
                AnneeScolaireFixtures::class,
                NiveauFixtures::class
        );
    }
}
