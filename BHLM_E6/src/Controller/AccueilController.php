<?php
namespace App\Controller;

use App\Entity\SessionExam;
use App\Entity\Utilisateur;
use App\Entity\Entreprise;
use App\Entity\Profil;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

    class AccueilController extends AbstractController
    {
        #[Route(path: '/accueil', name: 'accueil')]
        public function Accueil(ManagerRegistry $doctrine, Request $request): Response
        {
            $tri = $request->query->get('tri', 'nom'); // on récupère le paramètre tri de la requête
            $ordre = $request->query->get('ordre', 'asc');  // on récupère le paramètre ordre de la requête

            $session = $request->getSession();
            $userId = $session->get('user_id');
            $userRole = $session->get('user_role');

            $entityManager = $doctrine->getManager();
            $user = $entityManager->getRepository(Utilisateur::class)->find($userId);

            $entrepriseRepository = $entityManager->getRepository(Entreprise::class);
            $listeEntreprise = $entrepriseRepository->findBy([], [$tri => $ordre]); 

            $sessionExamRepository = $entityManager->getRepository(SessionExam::class);
            $listeSessionExam = $sessionExamRepository->findAll();

            $profilRepository = $entityManager->getRepository(Profil::class);
            $profil = $profilRepository->findAll();

            return $this->render('accueil.html.twig', ['listeEntreprise' => $listeEntreprise, 'tri' => $tri, 'ordre' => $ordre, 'user' => $user, 'userRole' => $userRole, 'listeSessionExam' => $listeSessionExam, 'profil' => $profil]);
        }

    }
?>