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
        $this->databaseService = new DatabaseService();
    }
    public function getProduct(int $id): Product
    {
        $result = $this->cacheService->loadProductFromCache($id);
        if (strlen($result) === 0) {
            $result = $this->databaseService->getProduct($id, false);
            $this->cacheService->saveToCache($result);
        } else {
            $dataOfArray = explode(",", $result);
            $result = new Product($dataOfArray[0], $dataOfArray[1], $dataOfArray[2], $dataOfArray[3]);
        }
        $this->marketingService->incrementProduct($id);
        return $result;
    }
}