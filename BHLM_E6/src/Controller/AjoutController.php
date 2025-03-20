<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Employe;
use App\Form\AjoutType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjoutController extends AbstractController
{
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
    {
        $entreprise = new Entreprise();

        // Création du formulaire d'ajout d'entreprise
        $form = $this->createForm(AjoutType::class, $entreprise);
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
        return $this->render('ajout.html.twig', ['ajoutEntreprise' => $form->createView(),]);
    }
}
?>