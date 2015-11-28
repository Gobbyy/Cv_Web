<?php

namespace CvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResumeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('poste')
            ->add('formation', 'collection',array(
              'type' => new FormationType(),
              'allow_add' => true,
              'allow_delete' => true)
              )
            ->add('experience', 'collection',array(
              'type' => new ExperienceType(),
              'allow_add' => true,
              'allow_delete' => true)
              )
            ->add('shortresume')
            //->add('langues', 'entity', array(
            //  'class' => 'CvBundle:Langue',
            //  'choice_label' => 'langue',
            //  'multiple' => 'true')
            //  )

            ->add('save','submit')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CvBundle\Entity\Resume'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cvbundle_resume';
    }
}
