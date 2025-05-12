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

class ModifEmployeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType :: class, ['label' => 'Nom*'])
        ->add('prenom', TextType :: class, ['label' => 'Prénom*'])
        ->add('fonction', TextType :: class, ['label' => 'Fonction'])
        ->add('mail', EmailType :: class, ['label' => 'Email'])
        ->add('tel', TextType :: class, ['label' => 'Téléphone'])
        ->add('idEntreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise*'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler et retourner à l\'accueil','attr' => ['onclick' => 'window.location.href="' . '/accueil' . '"']]);
    }
}

?>