<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjoutEtudiantConfirmationController extends AbstractController{
    function Confirmation(){
        return $this->render('ajoutEtudiantConfirmation.html.twig');
    }
}
?>