<?php
require_once("FileService.php");

class CacheService
{
    private string $cacheFileName;
    private FileService $cacheFileService;
    public function __construct()
    {
        $this->cacheFileName = "cacheData.txt";
        $this->cacheFileService = new FileService("../files/", $this->cacheFileName);
    }
    public function saveToCache(int $id): void
    {
        $this->cacheFileService->updateFile($id);
    }
    public function loadFromCache(int $id): void
    {
    }
    private function lookForProduct(int $id): void
    {
    }
}