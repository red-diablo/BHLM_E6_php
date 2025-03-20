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
            //met dans un tableau les données d'entreprise et sa relation avec employes
            $listeEntreprise = $entityManager->getRepository(Entreprise::class)->findAllWithEmployeEtudiant();
            return $this->render('accueil.html.twig', ['listeEntreprise' => $listeEntreprise]);
        }
    }
?>