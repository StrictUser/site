<?php

    namespace Tests\Controller;

    use \AppBundle\Controller\PaginationController;

    class PaginationControllerTest extends \PHPUnit_Framework_TestCase
    {
        public function testgetPageList()
        {
            $paginator = new PaginationController(2, 101, 10);
            $pages=$paginator->getNumberOfPages();
            static::assertEquals($pages, 11);
            $list=$paginator->getPagesList();
            static::assertEquals($list, array(1,2,3,4,5));

            $paginator = new PaginationController(7, 101, 10);
            $list=$paginator->getPagesList();
            static::assertEquals($list, array(5,6,7,8,9));

            $paginator=new PaginationController(10, 101, 10);
            $list=$paginator->getPagesList();
            static::assertEquals($list, array(7,8,9,10,11));
        }
    }