<?php

    namespace AppBundle\Admin;


    use Knp\Menu\FactoryInterface;

    class MenuBuilder
    {
        private $factory;

        public function __construct(FactoryInterface $factory)
        {
            $this->factory = $factory;
        }

        public function createMainMenu(array $options)
        {
            $menu = $this->factory->createItem('root');
            $menu->addChild('Главная', array('route' => '_home'));
            //$menu->addChild('Category', array('route' => 'category'));
            //$menu->addChild('Goods', array('route' => 'goods'));

            return $menu;
        }
    }