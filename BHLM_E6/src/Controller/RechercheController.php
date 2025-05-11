<?php

namespace App\Controller;

use App\Entity\SecteurActivite;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RechercheController extends AbstractController
{
    public function recherche(ManagerRegistry $doctrine, Request $request): Response
    {
        // Récupération des données du formulaire GET
        $motcle = $request->query->get('motcle', '');
        $secteurId = $request->query->get('secteur', '');
        
        $secteurId = $secteurId !== '' ? (int) $secteurId : null;        

        // Récupération des secteurs pour alimenter la liste déroulante
        $secteurs = $doctrine->getRepository(SecteurActivite::class)->findAll();

        // Récupération des entreprises filtrées
        $entrepriseRepo = $doctrine->getRepository(Entreprise::class);
        $entreprises = $entrepriseRepo->search($motcle, $secteurId);

        return $this->render('recherche.html.twig', [
            'secteurs' => $secteurs,
            'entreprises' => $entreprises
        ]);        
    }  // Retourne la vue avec les résultats et les secteurs

}

?>