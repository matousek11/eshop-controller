<?php
class FileService
{
    private string $baseRoute;
    private string $fileName;
    public function __construct(string $baseRoute, string $fileName)
    {
        $this->baseRoute = $baseRoute;
        $this->fileName = $fileName;
        $this->makeFolder($baseRoute);
    }
    public function readFile(): string
    {
        $result = file_get_contents($this->baseRoute . $this->fileName);
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
            if (!$this->checkIfSubstringExists($dataFromFile, $newData))
                $this->writeToFile($newData);
        }
    }

    private function writeToFile(string $data): void
    {
        $completeRoute = $this->baseRoute . $this->fileName;
        $dataToSave = $data . ";";
        file_put_contents($completeRoute, $dataToSave, FILE_APPEND | LOCK_EX);
    }
    private function checkIfSubstringExists(string $data, string $substring): bool
    {
        $dataIncludeSubstring = false;
        $arrayOfData = explode(";", $data);
        for ($i = 0; $i < sizeof($arrayOfData); $i++)
            if ($arrayOfData[$i] == $substring)
                $dataIncludeSubstring = true;
        return $dataIncludeSubstring;
    }
    private function makeFolder(string $folderName): void
    {
        if (!file_exists($folderName))
            mkdir($folderName);
    }
}