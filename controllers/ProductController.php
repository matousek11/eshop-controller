<?php
require_once('../classes/ProductService.php');
class ProductController
{
    public function detail($id)
    {
        $productService = new ProductService();
        $id = $_GET['id'];
        if ($id >= 0 && is_int($id))
            $productService->getProduct($id);
        else if (is_int($id) === false)
            echo ("Id is not int, enter int.");
        else
            echo ("Enter id equal or bigger than 0.");
    }
}