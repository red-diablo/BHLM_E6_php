<?php
namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Profil;
use App\Entity\SecteurActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutProfilType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Profil', EntityType::class, ['class' => Profil::class, 'choice_label' => function (Profil $profil) {$formation = $profil->getFormation(); $option = $profil->getOptionFormation(); return $option ? "$formation - $option" : "$formation - (sans option)";},'required' => true, 'label' => 'Type de profil recherché :'])        
        ->add('Entreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise :'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>