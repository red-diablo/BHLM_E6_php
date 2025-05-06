<?php
namespace App\Controller;

use App\Entity\Employe;
use App\Entity\Entreprise;
use App\Form\ModifEmployeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifEmployeController extends AbstractController
{
    #[Route('/modifEmploye', name: 'modifEmploye')]
    public function appelFormModif(Request $request, ManagerRegistry $doctrine): Response
    {
        $employe = new Employe();

        $entreprises = $doctrine->getRepository(Entreprise::class)->findAll();

        // Création du formulaire d'ajout d'employés
        $form = $this->createForm(ModifEmployeType::class, $employe);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire dans l'objet Employe
            $employe = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($employe); // Persister les données
            $entityManager->flush(); // Sauvegarder dans la base de données

            // Message de succès
            $this->addFlash('success', 'Employé.ée modifier avec succès !');
        }

        // Afficher le formulaire
        return $this->render('modifEmploye.html.twig', ['modifEmploye' => $form->createView(),]);
    }
}
?>