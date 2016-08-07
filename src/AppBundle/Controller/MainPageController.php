<?php

    namespace AppBundle\Controller;


    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class MainPageController extends Controller
    {
        /**
         * @Route("/site.com", name="_home")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction()
        {
            $goods = $this->getDoctrine()
                ->getRepository('AppBundle:Goods')
                ->findAll();

            if (!$goods) {
                throw $this->createNotFoundException(
                    'No item found!'
                );
            }

            $categories = $this->getDoctrine()
                ->getRepository('AppBundle:Category')
                ->findAll();

            return $this->render('site.com/index.html.twig', array(
                'products' => $goods,
                'categories' => $categories
            ));
        }
    }