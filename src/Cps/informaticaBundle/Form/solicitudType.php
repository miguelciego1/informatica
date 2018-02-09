<?php

namespace Cps\informaticaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class solicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ruta')
                ->add('fecha', 'genemu_jquerydate', array(
                        'widget' => 'single_text'
                    ))
                ->add('referencia')
                ->add('remitente', 'genemu_jqueryautocomplete_entity', array(
                'class' => 'Cps\informaticaBundle\Entity\remitente',
                'route_name' => 'ajax_remitente'
                        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cps\informaticaBundle\Entity\solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cps_informaticabundle_solicitud';
    }


}
