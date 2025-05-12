<?php
namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class AjoutEmployeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom'])
        ->add('prenom', TextType :: class, ['label' => 'Prénom', 'required' => false])
        ->add('fonction', TextType :: class, ['label' => 'Fonction', 'required' => false])
        ->add('mail', EmailType :: class, ['label' => 'Email', 'required' => false])
        ->add('tel', TextType :: class, ['label' => 'Téléphone', 'required' => false])
        ->add('idEntreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise*'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>