<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use Doctrine\ORM\EntityManager;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(): Response
    {
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
        ]);
    }
    #[Route('/classe/save', name: 'app_classe_save',methods:["POST","GET"])]

    public function saveAndUpdate(Request $request,EntityManagerInterface $manager,ClasseRepository $classeRepository):Response{
        $classe=new Classe();
        $form=$this->createForm(ClasseType::class,$classe);
        return $this->render('classe/form.html.twig', [
            "form"=> $form->createView()
         ]);
    }
}

