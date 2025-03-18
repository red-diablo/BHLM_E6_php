<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class AccueilController extends AbstractController
    {
        public function Accueil(){
            $titre="liste des entreprise";
            return $this->render('accueil.html.twig', ['titreDeLaPage' => $titre]);
        }
    }
?>