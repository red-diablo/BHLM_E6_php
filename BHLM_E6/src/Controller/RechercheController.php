<?php

namespace App\Controller;

use App\Entity\SecteurActivite;
use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\SecteurActiviteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route(path: '/recherche', name: 'recherche')]
    public function recherche(ManagerRegistry $doctrine, Request $request): Response
    {
        $motcle = $request->query->get('motcle', '');
        $secteurId = $request->query->get('secteur', '');
        $critere = $request->query->get('critere', 'nom');
        $secteurSelectionne = $request->query->get('secteur', '');
        if ($secteurSelectionne !== '') {
            $secteurSelectionne = (string) $secteurSelectionne;
        }

        $secteurId = $secteurId !== '' ? (int) $secteurId : null;

        $secteurs = $doctrine->getRepository(SecteurActivite::class)->findAll();

        $entrepriseRepo = $doctrine->getRepository(Entreprise::class);
        $entreprises = $entrepriseRepo->search($motcle, $secteurId, $critere);

        return $this->render('recherche.html.twig', [
            'secteurs' => $secteurs,
            'entreprises' => $entreprises,
            'secteurSelectionne' => $secteurSelectionne
        ]);

    }

}

?>