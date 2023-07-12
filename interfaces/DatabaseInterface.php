<?php

interface IElasticSearchDriver
{
    public function findById($id);
}

interface IMySQLDriver
{
    public function findProduct($id);
}