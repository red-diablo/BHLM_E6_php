<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutEtudiantType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom*'])
        ->add('prenom', TextType :: class, ['label' => 'Prénom*'])
        ->add('annee', TextType :: class, ['label' => 'Année du stage*'])
        ->add('bts', TextType :: class, ['label' => 'Nom du BTS*', 'data' => 'BTS '])
        ->add('specialite', TextType :: class, ['label' => 'Spécialité (SLAM ou SISR)*'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>