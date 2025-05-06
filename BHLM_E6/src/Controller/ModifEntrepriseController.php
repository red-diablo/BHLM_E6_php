<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\ModifEntrepriseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifEntrepriseController extends AbstractController
{
    #[Route('/entreprise/modifier/{id}', name: 'modif_entreprise')]
    public function appelFormModif(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $entreprise = $doctrine->getRepository(Entreprise::class)->find($id);

        if (!$entreprise) {
            throw $this->createNotFoundException("Entreprise avec l'ID $id non trouvée.");
        }

        $form = $this->createForm(ModifEntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();
            $this->addFlash('success', 'Entreprise modifiée avec succès.');
        }

        return $this->render('modifEntreprise.html.twig', [
            'modifEntreprise' => $form->createView(),
        ]);
    }
}
