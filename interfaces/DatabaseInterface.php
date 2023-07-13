<?php
require_once("../models/Product.php");

interface IElasticSearchDriver
{
    public function findById($id);
}

interface IMySQLDriver
{
    public function findProduct($id);
}