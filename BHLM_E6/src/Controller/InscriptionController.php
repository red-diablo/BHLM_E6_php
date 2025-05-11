<?php
namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function appelForm(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHash): Response
    {
        $utilisateur = new Utilisateur();

        // Création du formulaire d'ajout d'entreprise
        $form = $this->createForm(InscriptionType::class, $utilisateur);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire dans l'objet Entreprise
            $utilisateur = $form->getData();

            // Hashage du mot de passe avant de le persister
            if ($utilisateur->getMdp()) {
                $hashedPassword = $passwordHash->hashPassword($utilisateur, $utilisateur->getMdp());
                $utilisateur->setMdp($hashedPassword);
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($utilisateur); // Persister les données
            $entityManager->flush(); // Sauvegarder dans la base de données

            // Message de succès
            return $this->redirectToRoute('connexion', ['message' => 'Inscription réussie !']);
        }

        // Afficher le formulaire
        return $this->render('inscription.html.twig', ['inscriptionForm' => $form->createView(),]);
    }
}
?>