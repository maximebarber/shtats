<?php


namespace App\Controller;

// src/App/Controller/ProductController.php
use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

// ...

class ProductController extends AbstractController
{
    #[Route('/create-product', methods: ['GET'])]
    public function createAction(DocumentManager $dm)
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
    
        $dm->persist($product);
        $dm->flush();
    
        return new Response('Created product id ' . $product->getId());
    }
}