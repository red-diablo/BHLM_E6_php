<?php
namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutEtudiantEntrepriseType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Etudiant', EntityType :: class, ['class' => Etudiant:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Etudiant :'])
        ->add('Entreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise :'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Retour','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>