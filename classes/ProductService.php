<?php
require_once('CacheService.php');

class ProductService
{
    private CacheService $cacheService;
    public function __construct()
    {
        $this->cacheService = new CacheService();
    }
    public function getProduct(int $id): void
    {
        echo ("product $id");
        $this->cacheService->saveToCache($id);
    }
}