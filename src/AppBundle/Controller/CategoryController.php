<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/categories", name="categories")
     * @Template()
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findBy([], ['name' => 'ASC']);

        return ['categories' => $categories];

    }
}
