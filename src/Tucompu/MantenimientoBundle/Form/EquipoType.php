<?php

namespace Tucompu\MantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EquipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreEquipo')
            ->add('detalle')
            ->add('fechaCreacion')
            ->add('fechaEdicion')
            ->add('propietario')
            ->add('tipoEquipo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tucompu\MantenimientoBundle\Entity\Equipo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tucompu_mantenimientobundle_equipo';
    }
}
