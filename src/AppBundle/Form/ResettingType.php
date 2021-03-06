<?php

declare(strict_types=1);

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('plainPassword',RepeatedType::class, array(
                'type' => PasswordType::class,
                "error_bubbling" => true,
                'trim' => true,
                'invalid_message' => "security.password_resetting.match",
                'first_options' => array('label' => 'Password', "attr"=>array("class"=> "form-control", 'placeholder' => "security.resetting.email.placeholders.password")),
                'second_options' => array('label' => 'Repeat Password', "attr"=>array("class"=> "form-control", 'placeholder' => "security.resetting.email.placeholders.repeat_password"))))
                ->add("submit", SubmitType::class, array('attr'=>array('class' => "btn btn-large start-btn")));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'translation_domain' => 'translations',
            'method' => 'PATCH',
        ));
    }
}