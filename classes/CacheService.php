<?php
require_once("FileService.php");
require_once("TextService.php");
require_once("../models/Product.php");

class CacheService
{
    private string $cacheFileName;
    private FileService $cacheFileService;
    private TextService $textService;
    public function __construct()
    {
        $this->cacheFileName = "cacheData.txt";
        $this->cacheFileService = new FileService("../files/", $this->cacheFileName, false);
        $this->textService = new TextService();
    }
    public function saveToCache(Product $product): void
    {
        $productToCache = $product->id . "," . $product->nameOfProduct . "," . $product->price . "," . $product->imageUrl;
        $this->cacheFileService->updateFile($productToCache . ";");
    }
    public function loadProductFromCache(int $id): string
    {
        $cache = $this->cacheFileService->readFile();
        $productIsInCache = $this->textService->checkIfSubstringExists($cache, $id);
        if ($productIsInCache) {
            $cacheArray = explode(";", $cache);
            for ($x = 0; $x < sizeof($cacheArray); $x++) {
                if (str_contains($cacheArray[$x], $id))
                    $result = $x;
            }
            return $cacheArray[$result];
        } else {
            return "";
        }
    }
}