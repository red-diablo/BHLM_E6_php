<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeconnexionController extends AbstractController
{
    public function deconnexion(Request $request): RedirectResponse
    {
        // Supprimer les données de la session
        $session = $request->getSession();
        $session->remove('user_id');
        $session->remove('user_role');

        // Rediriger vers la page de connexion
        return $this->redirectToRoute('connexion');
    }
}
?>