# Eshop controller

Eshop controller shows product based on id in url. Look into cache for product, if not found it looks into database and cache it for next time. Then it increase number of request on current product for marketing purpose and return Json data.

## Table of content

- [How it works](#how-it-works)
- [How to run Eshop controller](#how-to-run-eshop-controller)
- [Switch between ElasticSearch and MySql](#switch-between-elasticsearch-and-mysql)

## How it works

Id of product is checked if it is saved in cache, then product is returned in Json. If not it is randomly generated by fake database, saved to cache for later use and returned in Json. Number of searches of every id is saved into file. With every access to product, number of views of specific product is increased by 1. Cache is in `files/cacheData.txt`. Marketing data is in `files/marketingData.txt`. Database source can be switched with [instructions](#switch-between-elasticsearch-and-mysql) lower in readme.

## How to run Eshop controller

1. Install `Docker`.
2. Run command `make build-image` in cmd.
3. Run command `make run-container`.
4. Open browser with url `localhost:3000/api/product?id=1`.

## How to stop container

1. Run command `make stop-container`.

## Switch between ElasticSearch and MySql

1. Open `ProductService.php`.
2. Find method `getProduct($id, false)` on class `DatabaseService`.
3. Change boolean false on method `getProduct($id, false)` to true to switch on MySql.
