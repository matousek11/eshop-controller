<?php
require_once("ProductsGenerator.php");
require_once("../models/Product.php");
require_once("../interfaces/DatabaseInterface.php");

class MySQLAdapter implements IMySQLDriver
{
    private ProductsGenerator $productsGenerator;
    public function __construct()
    {
        $this->productsGenerator = new ProductsGenerator();
    }
    public function findProduct($id): Product
    {
        return $this->productsGenerator->generateProducts($id);
    }
}