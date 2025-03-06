<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class BonjourController extends AbstractController{
        function bonjour(){
            $titre="Bonjour, connectez-vous :";
            return $this->render('base.html.twig', ['titreDeLaPage' => $titre]);
        }
    }

?>