<?php

namespace App\Controller\Frontend;

use App\Entity\Frontend\Category;
use App\Entity\Frontend\Product;
use App\Form\Frontend\ProductFormType;
use App\Repository\Frontend\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('frontend/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }


    public function create(): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);
        return $this->render('/frontend/product/create.html.twig', ['form' => $form->createView()]);
    }


}
