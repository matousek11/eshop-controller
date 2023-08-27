<?php
require_once("../models/Product.php");
class ProductsGenerator
{
    private array $nameOfProductArray;
    private array $productImages;
    private int $numberOfProducts;
    public function __construct()
    {
        $this->nameOfProductArray = array("TV", "Computer", "Notebook", "Phone", "Watch");
        $this->productImages = array("/img/tv.jpg", "/img/computer.jpg", "/img/notebook.jpg", "/img/phone.jpg", "/img/watch.jpg");
        $this->numberOfProducts = sizeof($this->nameOfProductArray);
    }
    public function generateProducts(int $id): Product
    {
        $randomNumber = rand(0, $this->numberOfProducts - 1);
        $pickedProduct = $this->nameOfProductArray[$randomNumber];
        $pickedImage = $this->productImages[$randomNumber];
        $price = rand(5000, 30000);
        return new Product($id, $pickedProduct, $price, $pickedImage);
    }
}