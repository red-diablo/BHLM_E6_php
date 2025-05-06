<?php
namespace App\Form;

use App\Entity\Employe;
use App\Entity\SessionExam;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class AjoutSessionExamType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('SessionExam', EntityType::class, ['class' => SessionExam::class, 'choice_label' => function (SessionExam $session) { return $session->getSpecialite() . ' - ' . $session->getMois() . ' ' . $session->getAnnee();}, 'required' => true, 'label' => 'Session d\'exam :'])
        ->add('Employe', EntityType::class, ['class' => Employe::class, 'choice_label' => function (Employe $employe) { return $employe->getNom() . ' ' . $employe->getPrenom(); }, 'required' => true, 'label' => 'Employé :'])
        ->add ('submit', SubmitType :: class, ['label' => 'Valider'])
        ->add('cancel', ButtonType::class, ['label' => 'Annuler','attr' => ['onclick' => 'window.location.href="' . '/ajout' . '"']]);
    }
}

?>