<?php

namespace Cps\informaticaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class personalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom','text',array('label' => 'Nombre '))
                ->add('app','text',array('label' => 'A. Paterno '))
                ->add('apm','text',array('label' => 'A. Materno '))
                ->add('servicio' , 'choice',array('choices' => array("1" =>"Sistema","2"=>"Redes","3"=>"Servidores","4"=>"Serv. Tecnico","5"=>"Archivo"))
                        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cps\informaticaBundle\Entity\personal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cps_informaticabundle_personal';
    }


}
