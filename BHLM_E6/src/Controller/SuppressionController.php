<?php
namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class SuppressionController extends AbstractController
{
    public function appelFormSuppression(Entreprise $entreprise): Response
    {
        return $this->render('suppression.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }



    public function suppression(Request $request, Entreprise $entreprise, EntityManagerInterface $entityManager): Response
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