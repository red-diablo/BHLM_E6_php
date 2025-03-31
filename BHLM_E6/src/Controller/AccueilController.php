<?php
namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


    class AccueilController extends AbstractController
    {
        public function Accueil(ManagerRegistry $doctrine, Request $request): Response
        {
            $tri = $request->query->get('tri', 'nom'); // on récupère le paramètre tri de la requête
            $ordre = $request->query->get('ordre', 'asc');  // on récupère le paramètre ordre de la requête

            $entityManager = $doctrine->getManager();
            $entrepriseRepository = $entityManager->getRepository(Entreprise::class);

            $listeEntreprise = $entrepriseRepository->findBy([], [$tri => $ordre]); 

            return $this->render('accueil.html.twig', ['listeEntreprise' => $listeEntreprise, 'tri' => $tri, 'ordre' => $ordre,]);
        }

    }
?>