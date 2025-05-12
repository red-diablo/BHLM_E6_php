<?php
namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Entreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ModifEtudiant extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etudiants', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Étudiants à associer à l’entreprise :',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Valider'])
            ->add('cancel', ButtonType::class, [
                'label' => 'Annuler',
                'attr' => ['onclick' => 'window.location.href="/accueil"']
            ]);
    }
}
