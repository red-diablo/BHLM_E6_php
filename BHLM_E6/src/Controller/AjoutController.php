<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Entreprise;
use App\Form\AjoutType;
use Doctrine\Persistence\ManagerRegistry;

class AjoutController extends AbstractController
{
    public function appelFormAjout(Request $request)
    {
        $form = $this->createForm(AjoutType :: class);
        $form->handleRequest($request);

        return $this->render('ajout.html.twig', ['ajoutEntreprise' => $form->createView()]);
    }
}

?>