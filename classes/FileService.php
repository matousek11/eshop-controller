<?php
require_once("TextService.php");

class FileService
{
    private string $baseRoute;
    private string $fileName;
    private bool $writeToBlankFile;
    private TextService $textService;
    public function __construct(string $baseRoute, string $fileName, $writeToBlankFile)
    {
        $this->baseRoute = $baseRoute;
        $this->fileName = $fileName;
        $this->writeToBlankFile = $writeToBlankFile;
        $this->textService = new TextService();
        $this->makeFolder();
    }
    public function readFile(): string
    {
        $filePath = $this->baseRoute . $this->fileName;
        if (!file_exists($filePath))
            return "";
        $result = file_get_contents($filePath);
        if ($result)
            return $result;
        else
            return "";
    }
    public function updateFile(string $newData): void
    {
        $filePath = $this->baseRoute . $this->fileName;
        if (!file_exists($filePath))
            $this->writeToFile($newData);
        else {
            $dataFromFile = $this->readFile();
            if (!$this->textService->checkIfSubstringExists($dataFromFile, $newData))
                $this->writeToFile($newData);
        }
    }

    private function writeToFile(string $data): void
    {
        $completeRoute = $this->baseRoute . $this->fileName;
        if ($this->writeToBlankFile === true)
            file_put_contents($completeRoute, $data, LOCK_EX);
        else
            file_put_contents($completeRoute, $data, FILE_APPEND | LOCK_EX);
    }
    private function makeFolder(): void
    {
        if (!file_exists($this->baseRoute))
            mkdir($this->baseRoute);
    }
}