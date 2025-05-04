<?php
namespace App\Form;


use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Employe;
use App\Entity\SecteurActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class UpdateEntrepriseType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
        //entreprise 
        ->add('nom', TextType :: class, ['label' => 'Nom de l\'entreprise*'])
        ->add('adresse', TextType :: class, ['label' => 'Adresse*'])
        ->add('cp', TextType :: class, ['label' => 'Code postal*'])
        ->add('ville', TextType :: class, ['label' => 'Ville*'])
        ->add('SecteurActivite',EntityType :: class, ['class' => SecteurActivite:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Secteur d\'activité*'])
       
        //employer
        ->add('nom', TextType :: class, ['label' => 'Nom*'])
        ->add('prenom', TextType :: class, ['label' => 'Prénom*'])
        ->add('fonction', TextType :: class, ['label' => 'Fonction'])
        ->add('mail', EmailType :: class, ['label' => 'Email'])
        ->add('tel', TextType :: class, ['label' => 'Téléphone'])
        ->add('idEntreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise*'])
       
        //etudian
        ->add('Etudiant', EntityType :: class, ['class' => Etudiant:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Etudiant :'])
        ->add('Entreprise',EntityType :: class, ['class' => Entreprise:: class, 'choice_label' => 'nom', 'required' => true, 'label' => 'Entreprise :'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajoutEtudiant' . '"']])
  
       
       
    ;
    }
}

?>