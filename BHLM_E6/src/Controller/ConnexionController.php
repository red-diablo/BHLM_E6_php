<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Utilisateur;
use App\Form\ConnexionType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ConnexionController extends AbstractController
{
    public function appelConnexionForm(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(ConnexionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $login = $data['login'];  // Le login soumis
            $password = $data['password'];  // Le mot de passe soumis (en texte brut)

            $entityManager = $doctrine->getManager();

            // Recherche de l'utilisateur dans la base de données
            $user = $entityManager->getRepository(Utilisateur::class)->findOneBy(['login' => $login]);

            // Vérification du mot de passe
            if ($user && $passwordHasher->isPasswordValid($user, $password)) {
                $session = $request->getSession();
                $session->set('user_id', $user->getId());
                $session->set('user_role', $user->getAdministrateur());
                return $this->redirectToRoute('accueil');
            } 
            else 
            {
                // Ajoute un message d'erreur si les identifiants sont incorrects
                $this->addFlash('error', 'Identifiants incorrects');
            }
        }

        return $this->render('connexion.html.twig', [
            'titreDeLaPage' => "Connexion",
            'connexionForm' => $form->createView()
        ]);
    }
}
?>