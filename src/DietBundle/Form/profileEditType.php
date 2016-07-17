<?php

namespace DietBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('wzrost');
        $builder->add('waga');
        $builder->add('wiek');
        $builder->add('plec', 'choice', array(
            'choices'  => array(
                'Kobieta' => 'kobieta',
                'Mężczyzna' => 'mezczyzna',
        ),
        'choices_as_values' => true,
        ));
        $builder->add('paType', 'choice', array(
            'choices' => array(
                'Tryb życia siedzacy' => 1,
                'Tryb życia mało aktywny' => 2,
                'Tryb życia aktywny' => 3,
                'Tryb życia bardzo aktywny' => 4,
            ),
        'choices_as_values' =>true,
        ));
        $builder->add('dietType', 'choice', array(
            'choices' => array(
                'Chcę schudnąć' => 1,
                'Chcę utrzymać wagę' => 2,
                'Chcę przytyć' => 3,
            ),
        'choices_as_values' => true,
        ));
    }

    public function getParent()
    {
        

        // Or for Symfony < 2.8
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
