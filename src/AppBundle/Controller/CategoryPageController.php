<?php

    namespace AppBundle\Controller;


    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class CategoryPageController extends Controller
    {
        /**
         * @Route("/site.com/{slug}", name="category_name")
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction($slug)
        {
            $categories = $this->getDoctrine()
                ->getRepository('AppBundle:Category')
                ->findAll();

            if (!$categories) {
                throw $this->createNotFoundException(
                    'No categories found!'
                );
            }

            $category = $this->getDoctrine()
                ->getRepository('AppBundle:Category')
                ->findOneBy(array('name' => $slug));

            if (!$category) {
                throw $this->createNotFoundException(
                    'No category found!'
                );
            }

            return $this->render('site.com/category.html.twig', array(
                'categories' => $categories,
                'items' => $category->getItems(),
            ));
        }

        protected function getGoods($category_id)
        {
            return $this->getDoctrine()->getManager()
                ->getRepository('AppBundle:Goods')
                ->findBy($category_id);
        }
    }