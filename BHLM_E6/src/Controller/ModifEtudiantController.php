<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\AjoutEtudiantEntrepriseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifEtudiantController extends AbstractController
{
    #[Route('/modifierEtudiant/{id}', name: 'modifier_etudiant')]
    public function modifierEtudiant(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        // Formulaire sans entité liée car on va manipuler plusieurs entités manuellement
        $form = $this->createForm(AjoutEtudiantEntrepriseType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            /** @var Etudiant $etudiant */
            $etudiant = $data['Etudiant'];

            /** @var \App\Entity\Entreprise $entreprise */
            $entreprise = $data['Entreprise'];

            // Associer l'étudiant à l'entreprise
            $entreprise->addEtudiant($etudiant);

            $em = $doctrine->getManager();
            $em->persist($etudiant);
            $em->flush();

            $this->addFlash('success', 'Étudiant associé à l\'entreprise avec succès.');

            return $this->redirectToRoute('accueil'); // ou autre route
        }

        return $this->render('modifEtudiant.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
