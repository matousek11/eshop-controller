<?php
require_once('../classes/ProductService.php');

class ProductController
{
    public function detail($id): Product
    {
        $productService = new ProductService();
        $product = $productService->getProduct($id);
        $jsonData = $product;
        return $jsonData;
    }
}