<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 09.10.17
 * Time: 13:36
 */

namespace MaximPrihodko\Bundle\AppBundle\Form;


use MaximPrihodko\Bundle\AppBundle\Entity\user\UserData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userData', EntityType::class, [
                'class' => UserData::class
            ])
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('image', TextType::class)
            ->add('status', IntegerType::class)
            ->add('company_id', IntegerType::class)
        ;
    }
}