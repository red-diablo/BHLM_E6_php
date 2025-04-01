<?php
namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\AjoutEtudiantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutEtudiantController extends AbstractController
{
    #[Route('/ajoutEtudiant', name: 'ajoutEtudiant')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
    {
        $etudiant = new Etudiant();

        // Création du formulaire d'ajout d'étudiants
        $form = $this->createForm(AjoutEtudiantType::class, $etudiant);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire dans l'objet Etudiant
            $etudiant = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($etudiant); // Persister les données
            $entityManager->flush(); // Sauvegarder dans la base de données

            // Redirection pour associer l'étudiant ou non à une entreprise
            return $this->render('ajoutEtudiantConfirmation.html.twig', ['etudiant' =>$etudiant]);
        }

        // Afficher le formulaire
        return $this->render('ajoutEtudiant.html.twig', ['ajoutEtudiant' => $form->createView(),]);
    }
}
?>