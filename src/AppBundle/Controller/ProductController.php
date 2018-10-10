<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     */
    public function indexAction()
    {
        $products = [];

        for ($i = 1; $i <= 10; $i++) {
            $products[] = rand(1,100);
        }

        return $this->render('@App/product/index.html.twig', compact('products'));
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function showAction(Request $request)
    {
        $id = $request->get('id');
        return $this->render('@App/product/show.html.twig', ['id' => $id]);
    }
}
