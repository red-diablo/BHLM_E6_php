<?php
namespace App\Controller;

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
}
?>