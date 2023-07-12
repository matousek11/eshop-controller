<?php
require_once("../models/Product.php");
class ProductsGenerator
{
    private array $nameOfProductArray;
    private int $numberOfProducts;
    public function __construct()
    {
        $this->nameOfProductArray = array("TV", "Computer", "Notebook", "Phone", "Watch");
        $this->numberOfProducts = sizeof($this->nameOfProductArray);
    }
    public function generateProducts(int $id): Product
    {
        $pickedProduct = $this->nameOfProductArray[rand(0, $this->numberOfProducts)];
        $price = rand(5000, 30000);
        return new Product($id, $pickedProduct, $price);
    }
}