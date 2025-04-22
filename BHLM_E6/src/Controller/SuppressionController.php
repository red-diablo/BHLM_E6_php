<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Employe;
use App\Form\SupprType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SuppressionController extends AbstractController
{
    public function appelFormSuppression(ManagerRegistry $doctrine, Request $request): Response
    {
        return $this->render('suppression.twig');
    }
}
?>