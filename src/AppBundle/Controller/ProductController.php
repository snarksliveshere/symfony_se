<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

        return [
            'products' => $products
        ];
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id": "\d+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function showAction(Product $product)
    {
        return ['product' => $product];
    }

    /**
     * @Route("/category/{id}", name="product_by_category", requirements={"id": "\d+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function listByCategoryAction(Category $category)
    {
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findByCategory($category);

        return [
            'products' => $products
        ];
    }
}
