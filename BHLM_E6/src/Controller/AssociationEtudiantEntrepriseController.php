<?php
namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Entreprise;
use App\Form\AjoutEtudiantEntrepriseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssociationEtudiantEntrepriseController extends AbstractController
{
    #[Route('/assoEtudiantEntreprise', name: 'assoEtudiantEntreprise')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
{
    $entityManager = $doctrine->getManager();

    // Création du formulaire
    $form = $this->createForm(AjoutEtudiantEntrepriseType::class);
    $form->handleRequest($request);

    // Vérifier que le formulaire est soumis et valide
    if ($form->isSubmitted() && $form->isValid()) {
        // Récupérer les données du formulaire
        $data = $form->getData();
        
        // Vérifier si les données existent
        if (isset($data['Etudiant']) && isset($data['Entreprise'])) {
            $etudiant = $data['Etudiant'];  // Etudiant sélectionné
            $entreprise = $data['Entreprise'];  // Entreprise sélectionnée

            // Récupérer les entités en base
            $etudiant = $entityManager->getRepository(Etudiant::class)->find($etudiant);
            $entreprise = $entityManager->getRepository(Entreprise::class)->find($entreprise);

            // Vérifier si les entités existent en base
            if ($etudiant && $entreprise) {
                // Associer l'étudiant à l'entreprise
                $etudiant->addEntreprise($entreprise);
                $entityManager->persist($etudiant);
                $entityManager->flush();

                // Message de succès
                $this->addFlash('success', 'Étudiant associé à une entreprise avec succès !');
            }

            // Message d'erreur si les entités ne sont pas trouvées
            $this->addFlash('error', 'Étudiant ou entreprise non trouvé.');
        }
    }

    return $this->render('associationEtudiantEntreprise.html.twig', [
        'associationForm' => $form->createView(),
    ]);
}

}

?>
