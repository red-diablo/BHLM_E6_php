<?php
namespace App\Controller;

use App\Entity\Utilisateur;
use App\Formulaire\ConnexionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

    class ConnexionController extends AbstractController
    {
        #[Route ('/connexion')]
        public function appelConnexionForm(Request $request, EntityManagerInterface $entityManager)
        {
             $utilisateur = new Utilisateur();
             $connexionForm = $this->createForm(ConnexionType :: class, $utilisateur);
             $connexionForm->handleRequest($request);

            if ($connexionForm->isSubmitted() && $connexionForm->isValid()) 
            {
                // Chercher l'utilisateur en base de données
                $repo = $entityManager->getRepository(Utilisateur::class);
                $user = $repo->findOneBy(['login' => $utilisateur->getLogin()]);
                if ($user && password_verify($utilisateur->getMdp(), $user->getMdp())) {
                    // Connexion réussie, rediriger vers la page d'accueil (liste des entreprises)
                    return $this->redirectToRoute('accueil');
                }
                else {
                    return $this->render('connexion.html.twig', ['connexionForm'=> $connexionForm->createView()]);
                }
            }
            else
            {
                return $this->render('connexion.html.twig', ['connexionForm'=> $connexionForm->createView()]);
            }
         }
    }
?>