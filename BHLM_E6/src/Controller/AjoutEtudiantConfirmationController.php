<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AjoutEtudiantConfirmationController extends AbstractController
{
    #[Route(path: '/confirmation', name: 'confirmation')]
    function Confirmation(){
        return $this->render('ajoutEtudiantConfirmation.html.twig');
    }
}
?>