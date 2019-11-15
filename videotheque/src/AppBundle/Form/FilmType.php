<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array
    $options)
    {
        // Ajout des champs "classiques"
        $builder
            ->add('titre',
                'Symfony\Component\Form\Extension\Core\Type\TextType', array('label' =>
                    'Titre'))
            ->add('annee',
                'Symfony\Component\Form\Extension\Core\Type\NumberType', array('label' =>
                    'Année'))
            ->add('resume',
                'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('label' =>
                    'Résumé'));
        // Ajout des champs liés à une table
        $builder->add('genre',
            'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
                'class' => 'AppBundle:Genre',
                'required' =>true,
                'label' => "Genre",
                'choice_label' => 'nom',
            ));
        $builder->add('idrealisateur',
            'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
                'class' => 'AppBundle:Artiste',
                'required' =>true,
                'label' => "Réalisateur",
                'choice_label' => 'nom',
            ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Film'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_film';
    }
}
