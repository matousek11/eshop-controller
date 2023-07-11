<?php

class TextService
{
    public function checkIfSubstringExists(string $data, string $substring): bool
    {
        $dataIncludeSubstring = false;
        $arrayOfData = explode(";", $data);
        for ($i = 0; $i < sizeof($arrayOfData); $i++)
            if ($arrayOfData[$i] == $substring)
                $dataIncludeSubstring = true;
        return $dataIncludeSubstring;
    }
}