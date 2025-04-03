<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjoutController extends AbstractController{
    function Lien(){
        return $this->render('ajout.html.twig');
    }
}
?>