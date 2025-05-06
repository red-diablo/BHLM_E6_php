<?php
namespace App\Controller;

use App\Entity\Profil;
use App\Entity\Entreprise;
use App\Form\AjoutProfilType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutProfil extends AbstractController
{
    #[Route('/ajoutProfil', name: 'ajoutProfil')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
{
    $entityManager = $doctrine->getManager();

    // Création du formulaire
    $form = $this->createForm(AjoutProfilType::class);
    $form->handleRequest($request);

    // Vérifier que le formulaire est soumis et valide
    if ($form->isSubmitted() && $form->isValid()) {
        // Récupérer les données du formulaire
        $data = $form->getData();
        
        // Vérifier si les données existent
        if (isset($data['Profil']) && isset($data['Entreprise'])) {
            $profil = $data['Profil'];  // Etudiant sélectionné
            $entreprise = $data['Entreprise'];  // Entreprise sélectionnée

            // Récupérer les entités en base
            $profil = $entityManager->getRepository(Profil::class)->find($profil);
            $entreprise = $entityManager->getRepository(Entreprise::class)->find($entreprise);

            // Vérifier si les entités existent en base
            if ($profil && $entreprise) {
                // Associer l'étudiant à l'entreprise
                $profil->addProfil($entreprise);
                $entityManager->persist($profil);
                $entityManager->flush();

                // Message de succès
                $this->addFlash('success', 'Le type de profil recherché est ajouté à l\'entreprise !');
            }

            // Message d'erreur si les entités ne sont pas trouvées
            $this->addFlash('error', 'Echec de l\'ajout');
        }
    }

    return $this->render('ajoutProfil.html.twig', [
        'ajoutProfilForm' => $form->createView(),
    ]);
}

}

?>
