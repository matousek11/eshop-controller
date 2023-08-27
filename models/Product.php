<?php

class Product
{
    public int $id;
    public string $nameOfProduct;
    public int $price;
    public string $imageUrl;
    public function __construct(int $id, string $nameOfProduct, int $price, string $imageUrl)
    {
        $this->id = $id;
        $this->nameOfProduct = $nameOfProduct;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }
}