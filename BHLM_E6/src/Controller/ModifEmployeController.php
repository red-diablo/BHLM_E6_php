<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\ModifEmployeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifEmployeController extends AbstractController
{
    
    public function appelFormModif(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
    
        // Cherche un employé lié à cette entreprise (prend le 1er)
        $employe = $entityManager->getRepository(Employe::class)
            ->findOneBy(['idEntreprise' => $id]);
    
        if (!$employe) {
            throw $this->createNotFoundException("Aucun employé trouvé pour l'entreprise ID $id");
        }
    
        $form = $this->createForm(ModifEmployeType::class, $employe);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Employé modifié avec succès !');
            return $this->redirectToRoute('accueil');
        }
    
        return $this->render('modifEmploye.html.twig', [
            'modifEmploye' => $form->createView(),
        ]);
    }
}
