<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
    /**
     * Fields to be shown on create/edit forms
     *
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content')
            ->add('picture')
            ->add('category')
            ->add('tag')
            ->add('content', null, array('required' => false, 'attr' => array('class' => 'ckeditor')))
        ;
    }

    /**
     * Fields to be shown on filter forms
     *
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('date')
            ->add('category')
            ->add('tag')
        ;
    }

    /**
     * Fields to be shown on lists
     *
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('date')
            ->add('category')
            ->add('tag')
        ;
    }

    /**
     * Fields to be shown on show action
     *
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('content')
            ->add('picture')
            ->add('date')
            ->add('category')
            ->add('tag')
        ;
    }
} 