<?php
require_once("MySQLAdapter.php");
require_once("ElasticSearchAdapter.php");

class DatabaseService
{
    private MySQLAdapter $mySQLAdapter;
    private ElasticSearchAdapter $elasticSearchAdapter;
    public function __construct()
    {
        $this->mySQLAdapter = new MySQLAdapter();
        $this->elasticSearchAdapter = new ElasticSearchAdapter();
    }
    public function getProduct(int $id, bool $backup): string
    {
        if ($backup)
            return $this->mySQLAdapter->findProduct($id);
        else
            return $this->elasticSearchAdapter->findById($id);
    }
}