<!-- FORMULAIRE DE CONNEXION QUAND ON AURA CREER LES ENTITES
namespace App\Formulaire;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConnexionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('login', TextType :: class, ['label' => 'Login'])
        ->add('password', PasswordType :: class, ['label' => 'Mot de passe'])
        ->add ('submit', SubmitType :: class, ['label' => 'Se connecter'])
    }
} -->