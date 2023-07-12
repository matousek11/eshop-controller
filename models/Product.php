<?php

class Product
{
    public int $id;
    public string $nameOfProduct;
    public int $price;
    public function __construct(int $id, string $nameOfProduct, int $price)
    {
        $this->id = $id;
        $this->nameOfProduct = $nameOfProduct;
        $this->price = $price;
    }
}