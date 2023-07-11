<?php
require_once("FileService.php");
require_once("TextService.php");

class CacheService
{
    private string $cacheFileName;
    private FileService $cacheFileService;
    private TextService $textService;
    public function __construct()
    {
        $this->cacheFileName = "cacheData.txt";
        $this->cacheFileService = new FileService("../files/", $this->cacheFileName);
        $this->textService = new TextService();
    }
    public function saveToCache(int $id): void
    {
        $this->cacheFileService->updateFile($id);
    }
    public function loadProductFromCache(int $id): string
    {
        $cache = $this->cacheFileService->readFile();
        $productIsInCache = $this->textService->checkIfSubstringExists($cache, $id);
        if ($productIsInCache) {
            $cacheArray = explode(";", $cache);
            $result = array_search($id, $cacheArray);
            return $cacheArray[$result];
        } else {
            $this->saveToCache($id);
            return "";
        }
    }
}