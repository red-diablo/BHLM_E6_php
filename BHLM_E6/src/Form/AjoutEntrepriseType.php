<?php
namespace App\Form;

use App\Entity\SecteurActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutEntrepriseType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom de l\'entreprise*'])
        ->add('adresse', TextType :: class, ['label' => 'Adresse*'])
        ->add('cp', TextType :: class, ['label' => 'Code postal*'])
        ->add('ville', TextType :: class, ['label' => 'Ville*'])
        ->add('SecteurActivite',EntityType :: class, ['class' => SecteurActivite:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Secteur d\'activité*'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>