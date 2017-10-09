<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 09.10.17
 * Time: 11:51
 */

namespace MaximPrihodko\Bundle\AdminBundle\Admin;

use MaximPrihodko\Bundle\AppBundle\Entity\user\UserData;
use MaximPrihodko\Bundle\AppBundle\Form\UserDataType;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserDataAdmin extends UserAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        if ($this->getSubject() instanceof UserData) {
            $builder = $formMapper->getFormBuilder()->getFormFactory()->createBuilder(UserDataType::class);

            $formMapper
                ->with('Данные пользователя')
                ->add($builder->get('name'))
                ->add($builder->get('surname'))
                ->add($builder->get('image'))
                ->add($builder->get('status'))
                ->add($builder->get('company_id'))
                ->end();
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);

//        $datagridMapper
//            ->add('name')
//            ->add('surname');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);

        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('surname');
    }
}