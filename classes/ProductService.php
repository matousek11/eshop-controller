<?php
require_once('CacheService.php');
require_once('MarketingService.php');

class ProductService
{
    private CacheService $cacheService;
    private MarketingService $marketingService;
    public function __construct()
    {
        $this->cacheService = new CacheService();
        $this->marketingService = new MarketingService();
    }
    public function getProduct(int $id): void
    {
        echo ("product $id");
        $this->cacheService->loadProductFromCache($id);
        $this->marketingService->incrementProduct($id);
    }
}