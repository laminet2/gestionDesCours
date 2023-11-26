<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends User
{
    
    #[ORM\ManyToOne(inversedBy: 'professeurs')]
    private ?grade $grade = null;



    public function getGrade(): ?grade
    {
        return $this->grade;
    }

    public function setGrade(?grade $grade): static
    {
        $this->grade = $grade;

        return $this;
    }


}
