# Eshop controller

Eshop controller showing product based on id in url. Look into cache for product, if not found it looks into database and cache it for next time. Then it increase number of request on current product and return Json data.

# Table of content

- [How to run](#how-to-run)

# How to run Eshop controller

1. Install `Docker`
2. Run `docker build -t eshop-controller .` in cmd
3. Run `docker run -d -p 3000:80 -v $(pwd):/var/www/html eshop-controller`
4. Open browser with url `localhost:3000/api/product?id=1`

# How it works

Cache is in files/cacheData.txt.
