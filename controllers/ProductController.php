<?php
require_once('../classes/ProductService.php');

class ProductController
{
    public function detail($id): string
    {
        $productService = new ProductService();
        $product = $productService->getProduct($id);
        $jsonData = json_encode($product);
        return $jsonData;
    }
}