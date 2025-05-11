<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\ModifEntrepriseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class ModifController extends AbstractController
{
    public function appelFormModif(Entreprise $entreprise): Response
{
    return $this->render('modif.html.twig', [
        'entreprise' => $entreprise,
    ]);
}

    
}
?>