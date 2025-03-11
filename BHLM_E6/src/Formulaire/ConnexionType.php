<?php
namespace App\Formulaire;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Utilisateur;

class ConnexionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Login', TextType :: class, ['label' => 'Login'])
        ->add('Mdp', PasswordType :: class, ['label' => 'Mot de passe'])
        ->add ('submit', SubmitType :: class, ['label' => 'Se connecter']);
    }
}
?>