<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ContactType extends AbstractType
{

    /**
     * Permet d'avoir la configuration de base d'un champ
     *
     * @param [string] $label
     * @param [string] $placeholder
     * @param array $options
     * @return array
     */
    public function getConfiguration($label, $placeholder, $options = []){
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder,
            ]
        ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, $this->getConfiguration('Nom', "Tapez votre nom"))
            ->add('prenom', TextType::class, $this->getConfiguration('Prenom', "Tapez votre prénom"))
            ->add('avatar', UrlType::class, $this->getConfiguration('URL de l\'avatar', "Mettez une image pour votre avatar"))
            ->add('adresse', TextType::class, $this->getConfiguration('Adresse', "Mettez votre adresse"))
            ->add('codepostal', TextType::class, $this->getConfiguration('Code postal', "Mettez votre cp"))
            ->add('ville', TextType::class, $this->getConfiguration('Ville', "Mettez votre ville"))
            ->add('telephone', TextType::class, $this->getConfiguration('Téléphone', "Mettez votre numéro de téléphone"))
            ->add('mail', TextType::class, $this->getConfiguration('Adresse mail', "Mettez votre adresse mail"))
            ->add('categorie', EntityType::class, [
                // looks for choices from this entity
                'class' => Categorie::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'designation',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ], $this->getConfiguration('Catégorie', "Mettez votre catégorie"));
    }

     public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
