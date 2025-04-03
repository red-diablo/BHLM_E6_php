<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\SecteurActivite;
use App\Form\AjoutEntrepriseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutEntrepriseController extends AbstractController
{
    #[Route('/ajoutEntreprise', name: 'ajoutEntreprise')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
    {
        $entreprise = new Entreprise();

        $secteurs = $doctrine->getRepository(SecteurActivite::class)->findAll();

        // Création du formulaire d'ajout d'entreprise
        $form = $this->createForm(AjoutEntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire dans l'objet Entreprise
            $entreprise = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($entreprise); // Persister les données
            $entityManager->flush(); // Sauvegarder dans la base de données

            // Message de succès
            $this->addFlash('success', 'Entreprise ajoutée avec succès !');
        }

        // Afficher le formulaire
        return $this->render('ajoutEntreprise.html.twig', ['ajoutEntreprise' => $form->createView(),]);
    }
}
?>