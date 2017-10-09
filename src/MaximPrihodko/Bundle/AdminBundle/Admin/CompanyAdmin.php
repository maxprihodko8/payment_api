<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 09.10.17
 * Time: 11:51
 */

namespace MaximPrihodko\Bundle\AdminBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CompanyAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text');
        $formMapper->add('email', 'text');
        $formMapper->add('phone', 'text');
        $formMapper->add('adress', 'text');
        $formMapper->add('info', 'textarea');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('email');
        $datagridMapper->add('phone');
        $datagridMapper->add('adress');
        $datagridMapper->add('info');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('email');
        $listMapper->addIdentifier('phone');
        $listMapper->addIdentifier('adress');
    }
}