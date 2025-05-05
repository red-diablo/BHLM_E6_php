<?php
namespace App\Controller;

use App\Entity\SessionExam;
use App\Entity\Employe;
use App\Form\AjoutSessionExamType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutSessionExam extends AbstractController
{
    #[Route('/ajoutSessionExam', name: 'ajoutSessionExam')]
    public function appelFormAjout(Request $request, ManagerRegistry $doctrine): Response
{
    $entityManager = $doctrine->getManager();

    // Création du formulaire
    $form = $this->createForm(AjoutSessionExamType::class);
    $form->handleRequest($request);

    // Vérifier que le formulaire est soumis et valide
    if ($form->isSubmitted() && $form->isValid()) {
        // Récupérer les données du formulaire
        $data = $form->getData();
        
        // Vérifier si les données existent
        if (isset($data['SessionExam']) && isset($data['Employe'])) {
            $session = $data['SessionExam'];  // session d'exam sélectionné
            $employe = $data['Employe'];  // Employé sélectionnée

            // Récupérer les entités en base
            $session = $entityManager->getRepository(SessionExam::class)->find($session);
            $employe = $entityManager->getRepository(Employe::class)->find($employe);

            // Vérifier si les entités existent en base
            if ($session && $employe) {
                // Associer l'étudiant à l'entreprise
                $session->addJury($employe);
                $entityManager->persist($session);
                $entityManager->flush();

                // Message de succès
                $this->addFlash('success', 'Un employé est ok pour être jury !');
            }

            // Message d'erreur si les entités ne sont pas trouvées
            $this->addFlash('error', 'Echec de l\'ajout');
        }
    }

    return $this->render('ajoutJury.html.twig', [
        'ajoutJuryForm' => $form->createView(),
    ]);
}

}

?>
