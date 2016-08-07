<?php

	namespace AppBundle\Admin;
    namespace AppBundle\Admin;


	use AppBundle\Entity\Goods;
	use Sonata\AdminBundle\Admin\AbstractAdmin;
	use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use AppBundle\Entity\Goods;
    use Sonata\AdminBundle\Admin\AbstractAdmin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;

	class GoodsAdmin extends AbstractAdmin
	{
        protected function configureFormFields(FormMapper $formMapper)
        {
	        $formMapper
		        ->with('Content', array('class' => 'col-md-7'))
		            ->add('name', TextType::class)
		        ->end();
        }

		protected function configureListFields(ListMapper $listMapper)
		{
			$listMapper
				->addIdentifier('name')
			;
		}

		protected function configureDatagridFilters(DatagridMapper $datagridMapper)
		{
			$datagridMapper->add('name');
		}

		public function toString($object)
		{
			return $object instanceof Goods
				? $object->getName()
				: 'Item';
		}
	}