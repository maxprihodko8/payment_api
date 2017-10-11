<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 09.10.17
 * Time: 13:36
 */

namespace MaximPrihodko\Bundle\AppBundle\Form;

use MaximPrihodko\Bundle\AppBundle\Entity\Company;
use MaximPrihodko\Bundle\AppBundle\Entity\user\UserData;
use MaximPrihodko\Bundle\AppBundle\Entity\user\UserStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userData', EntityType::class, [
                'class' => UserData::class
            ])

            ->add('name', TextType::class, ['label' => 'user.name', 'translation_domain' => 'user'])
            ->add('surname', TextType::class, ['label' => 'user.surname', 'translation_domain' => 'user'])
            ->add('image', TextType::class, ['label' => 'user.image', 'translation_domain' => 'user'])
            ->add('status', EntityType::class, array(

                'class' => UserStatus::class,
                'choice_label' => 'translation',

                'required' => false,
                'multiple' => false,
            ))
            ->add('company_id', EntityType::class, array(
                'class' => Company::class,
                'choice_label' => 'name',
                'required' => false,
                'multiple' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserData::class,
        ));
    }
}