<?php

	namespace AppBundle\Admin;


	use AppBundle\Entity\Category;
	use Sonata\AdminBundle\Admin\AbstractAdmin;
	use Sonata\AdminBundle\Datagrid\DatagridMapper;
	use Sonata\AdminBundle\Datagrid\ListMapper;
	use Sonata\AdminBundle\Form\FormMapper;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Component\Form\Extension\Core\Type\TextType;

	class CategoryAdmin extends AbstractAdmin
	{
		protected function configureFormFields(FormMapper $formMapper)
		{
			$formMapper
				->with('Content', array('class' => 'col-md-7'))
				    ->add('name', TextType::class)
				->end()

				->with('Choose', array('class' => 'col-md-5'))
				    ->add('items', EntityType::class, array(
					    'class' => 'AppBundle\Entity\Goods',
					    'choice_label' => 'name',
				    ))
				->end();
		}

		protected function configureDatagridFilters(DatagridMapper $datagridMapper)
		{
			$datagridMapper->add('name');
		}

		protected function configureListFields(ListMapper $listMapper)
		{
			$listMapper
				->addIdentifier('name')
			;
		}

		public function toString($object)
		{
			return $object instanceof Category
				? $object->getName()
				: 'Category';
		}
	}    namespace AppBundle\Admin;


    use AppBundle\Entity\Category;
    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;

    class CategoryAdmin extends AbstractAdmin
    {
        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with('Content', array('class' => 'col-md-7'))
                    ->add('name', TextType::class)
                ->end()

                ->with('Choose', array('class' => 'col-md-5'))
                    ->add('items', EntityType::class, array(
                        'class' => 'AppBundle\Entity\Goods',
                        'choice_label' => 'name',
                    ))
                ->end();
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper->add('name');
        }

        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('name')
            ;
        }

        public function toString($object)
        {
            return $object instanceof Category
                ? $object->getName()
                : 'Category';
        }
    }