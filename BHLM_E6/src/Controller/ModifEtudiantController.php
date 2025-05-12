<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\ModifEtudiant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifEtudiantController extends AbstractController
{
    
    #[Route('/modifierEtudiant/{id}', name: 'modifEtudiant')]
    public function modifierEtudiant(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $entreprise = $em->getRepository(Entreprise::class)->find($id);

        if (!$entreprise) {
            throw $this->createNotFoundException('Entreprise non trouvée');
        }

       
        $etudiantsActuels = $entreprise->getEtudiants()->toArray();

        
        $data = ['etudiants' => $etudiantsActuels];

        $form = $this->createForm(ModifEtudiant::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donnees = $form->getData();
            $etudiantsSelectionnes = $donnees['etudiants'];

            // Retirer les étudiants non sélectionnés
            foreach ($etudiantsActuels as $etudiant) {
                if (!in_array($etudiant, $etudiantsSelectionnes, true)) {
                    $entreprise->removeEtudiant($etudiant);
                }
            }

            // Ajouter les nouveaux étudiants
            foreach ($etudiantsSelectionnes as $etudiant) {
                $entreprise->addEtudiant($etudiant);
            }

            $em->persist($entreprise);
            $em->flush();

            $this->addFlash('success', 'Étudiants associés mis à jour avec succès.');
            return $this->redirectToRoute('accueil');
        }

        return $this->render('modifEtudiant.html.twig', [
            'form' => $form->createView(),
            'entreprise' => $entreprise,
        ]);
    }
}
