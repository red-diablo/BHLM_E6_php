<?php
namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Entreprise;
use App\Form\AjoutEmployeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutEmployeController extends AbstractController
{
    #[Route('/ajoutEmploye', name: 'ajoutEmploye')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
    {
        $employe = new Employe();

        $entreprises = $doctrine->getRepository(Entreprise::class)->findAll();

        // Création du formulaire d'ajout d'employés
        $form = $this->createForm(AjoutEmployeType::class, $employe);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire dans l'objet Employe
            $employe = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($employe); // Persister les données
            $entityManager->flush(); // Sauvegarder dans la base de données

            // Message de succès
            $this->addFlash('success', 'Employé.ée ajouté avec succès !');
        }

        // Afficher le formulaire
        return $this->render('ajoutEmploye.html.twig', ['ajoutEmploye' => $form->createView(),]);
    }
}
?>