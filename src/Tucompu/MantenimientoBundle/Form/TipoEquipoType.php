<?php

namespace Tucompu\MantenimientoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoEquipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('nombre')
            ->add('descripcion')
            ->add('estado')
            ->add('fechaCreacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tucompu\MantenimientoBundle\Entity\TipoEquipo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tucompu_mantenimientobundle_tipoequipo';
    }
}
