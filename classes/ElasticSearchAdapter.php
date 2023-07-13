<?php
require_once("ProductsGenerator.php");
require_once("../models/Product.php");
class ElasticSearchAdapter implements IElasticSearchDriver
{
    private ProductsGenerator $productsGenerator;
    public function __construct()
    {
        $this->productsGenerator = new ProductsGenerator();
    }
    public function findById($id): Product
    {
        return $this->productsGenerator->generateProducts($id);
    }
}