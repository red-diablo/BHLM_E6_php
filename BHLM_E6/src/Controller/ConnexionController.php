<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class ConnexionController extends AbstractController{
        public function connexion(){
            $titre="Bonjour, connectez-vous :";
            return $this->render('base.html.twig', ['titreDeLaPage' => $titre]);
        }

        // public function appelConnexionForm(){
        //     $form = new Connexion;
        //     $connexionForm = $this->createForm(ConnexionType :: class, $form);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     $data = $form->getData();
        //     $login = $entityManager->getRepository(NomTable::class)->findOneBy(['login' => $data['login']]);

        //     if (!$login || !$passwordEncoder->isPasswordValid($login, $data['password'])) {
        //         $this->addFlash('error', 'Identifiants incorrects');
        //     } else {
        //         // Gérer la connexion (via un système de session ou Symfony Security) VOIRE DOCUMENTATION SYMFONYY
        //     }
        // }
        //     return $this->render('base.html.twig', ['connexionForm'=> $connexionForm->createView()]);
        // }
    }
?>