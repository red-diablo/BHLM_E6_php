<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AjoutController extends AbstractController
{
    #[Route(path: '/ajout', name: 'ajout')]
    function Lien(){
        return $this->render('ajout.html.twig');
    }
}
?>