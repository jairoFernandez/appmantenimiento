<?php

namespace Tucompu\MantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MantenimientoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaProgramada')
            ->add('fechaVisita')
            ->add('duracionServicio')
            ->add('comentario')
            ->add('equipo')
            ->add('tecnico')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tucompu\MantenimientoBundle\Entity\Mantenimiento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tucompu_mantenimientobundle_mantenimiento';
    }
}
