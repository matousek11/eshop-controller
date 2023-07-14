<?php
require_once("FileService.php");
require_once("TextService.php");
class MarketingService
{
    private string $marketingFileName;
    private FileService $marketingFileService;
    private TextService $textService;
    public function __construct()
    {
        $this->marketingFileName = "marketingData.txt";
        $this->marketingFileService = new FileService("../files/", $this->marketingFileName, true);
        $this->textService = new TextService();
    }
    public function incrementProduct(int $id): void
    {
        $this->updateData($id);
    }
    private function updateData(int $id): void
    {
        $marketingData = $this->marketingFileService->readFile();
        $marketingDataArray = explode(";", $marketingData);
        $indexOfProduct = $this->textService->findIndexOfSubstringInArray($marketingDataArray, $id . ":");
        if ($indexOfProduct >= 0 && $marketingData != "") {
            $searchedItem = $marketingDataArray[$indexOfProduct];
            $searchedItemArray = explode(":", $searchedItem);
            $newItemData = $searchedItemArray[0] . ":" . $searchedItemArray[1] + 1;
            $marketingDataArray[$indexOfProduct] = $newItemData;
            $implodedNewData = implode(";", $marketingDataArray);
            $this->marketingFileService->updateFile($implodedNewData);
        } else {
            $this->addProduct($id, $marketingData);
        }
    }
    private function addProduct(int $id, string $oldData): void
    {
        $newData = $id . ":" . 1;
        $dataToSave = $oldData . $newData . ";";
        $this->marketingFileService->updateFile($dataToSave);
    }
}