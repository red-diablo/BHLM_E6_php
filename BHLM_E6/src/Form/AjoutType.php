<?php
namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Employe;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutType extends AbstractType {
    #[Route('/ajout', name: 'ajout')]
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom de l\'Entreprise'])
        ->add('adresse', TextType :: class, ['label' => 'Adresse'])
        ->add('cp', TextType :: class, ['label' => 'Code postal'])
        ->add('ville', TextType :: class, ['label' => 'Ville'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/accueil' . '"']]);
    }
}

?>