<?php

class TextService
{
    public function checkIfSubstringExists(string $data, string $substring): bool
    {
        $dataIncludeSubstring = false;
        $arrayOfData = explode(";", $data);
        for ($i = 0; $i < sizeof($arrayOfData); $i++) {
            $idOfItem = explode(",", $arrayOfData[$i])[0];
            if ($idOfItem === $substring)
                $dataIncludeSubstring = true;
        }
        return $dataIncludeSubstring;
    }
    public function findIndexOfSubstringInArray(array $data, string $substring): int
    {
        for ($i = 0; $i < sizeof($data); $i++) {
            $item = explode(":", $data[$i])[0] . ":";
            if (strpos($item, $substring) !== false)
                return $i;
        }
        return -1;
    }

}