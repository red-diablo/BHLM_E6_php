<?php
namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\SecteurActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ModifEtudiant extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Etudiant', EntityType :: class, ['class' => Etudiant:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Etudiant :'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/accueil' . '"']]);
    }
}

?>