<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Employe;
use App\Form\ModifType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ModifController extends AbstractController
{
    public function appelFormModif(ManagerRegistry $doctrine, Request $request): Response
    {
        return $this->render('modif.html.twig');
    }

    public function Modification(Request $request, Entreprise $entreprise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('suppr_confirm' . $entreprise->getId(), $request->request->get('_token'))) {
            // Supprimer tous les employés liés à cette entreprise
            foreach ($entreprise->getEmployes() as $employe) {
                $entityManager->remove($employe);
            }
    
            // Supprimer l'entreprise
            $entityManager->remove($entreprise);
            $entityManager->flush();    
    
            
        } 

        return $this->redirectToRoute('accueil');
    }
}
?>