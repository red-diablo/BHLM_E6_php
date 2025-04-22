<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class InscriptionType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom*'])
        ->add('prenom', TextType :: class, ['label' => 'Prénom*'])
        ->add('login', TextType :: class, ['label' => 'Login*'])
        ->add('mdp', PasswordType :: class, ['label' => 'Mot de passe*'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/connexion' . '"']]);
    }
}

?>