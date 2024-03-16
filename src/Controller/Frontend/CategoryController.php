<?php

namespace App\Controller\Frontend;

use App\Entity\Frontend\Category;
use App\Form\Frontend\CategoryFormType;
use App\Repository\Frontend\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    private $em;
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $em)
    {
        $this->categoryRepository = $categoryRepository;
        $this->em = $em;
    }

    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();
        return $this->render('frontend/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }


    public function create(Request $request): Response
    {
        $product = new Category();
        $form = $this->createForm(CategoryFormType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $newCategory = $form->getData();
            $this->em->persist($newCategory);
            $this->em->flush();
            return $this->redirectToRoute('front_category_index');
        }
        return $this->render('/frontend/category/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function edit($id, Request $request): Response
    {
        $category = $this->categoryRepository->find($id);
        $form = $this->createForm(CategoryFormType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $newCategory = $form->getData();
            $this->em->persist($newCategory);
            $this->em->flush();
            return $this->redirectToRoute('front_category_index');
        }
        return $this->render('frontend/category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView()
        ]);
    }


    public function show($id): Response
    {
        $category = $this->categoryRepository->find($id);
        return $this->render('frontend/category/show.html.twig', [
            'category' => $category,
        ]);
    }


    public function delete($id): Response
    {
        $category = $this->categoryRepository->find($id);
        $this->em->remove($category);
        $this->em->flush();
        return $this->redirectToRoute('front_category_index');
    }


}
