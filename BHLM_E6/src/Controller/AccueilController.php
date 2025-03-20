<?php
namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class AccueilController extends AbstractController
    {
        public function Accueil(ManagerRegistry $doctrine)
        {
            $entityManager = $doctrine->getManager();
            //Met dans un tableau les données des entreprises et des employés
            $listeEntreprise = $entityManager->getRepository(Entreprise::class)->findAllWithEmployeEtudiant();
            return $this->render('accueil.html.twig', ['listeEntreprise' => $listeEntreprise]);
        }
    }
?>