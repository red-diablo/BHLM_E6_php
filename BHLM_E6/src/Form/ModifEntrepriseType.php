<?php
namespace App\Form;

use App\Entity\SecteurActivite;
use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;


class ModifEntrepriseType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class)
        ->add('adresse', TextType::class)
        ->add('ville', TextType::class)
        ->add('CP', TextType::class)
        ->add('secteurActivite', EntityType::class, [
            'class' => SecteurActivite::class,
            'choice_label' => 'nom',
            'placeholder' => '-- Sélectionner un secteur --',
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Enregistrer',
            'attr' => ['class' => 'btn btn-success']
        ])
        ->add('cancel', ButtonType::class, [
            'label' => 'Annuler',
            'attr' => [
                'class' => 'btn btn-secondary',
                'onclick' => 'window.history.back()'
            ]
        ]);
            
            
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
