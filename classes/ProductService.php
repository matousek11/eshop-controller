<?php
require_once('CacheService.php');
require_once('MarketingService.php');
require_once('DatabaseService.php');

class ProductService
{
    private CacheService $cacheService;
    private MarketingService $marketingService;
    private DatabaseService $databaseService;
    public function __construct()
    {
        $this->cacheService = new CacheService();
        $this->marketingService = new MarketingService();
    }
    public function getProduct(int $id): void
    {
        $result = $this->cacheService->loadProductFromCache($id);
        if (strlen($result) === 0) {
            $result = $this->databaseService->getProduct($id, false);
        }
        $this->marketingService->incrementProduct($id);
    }
}