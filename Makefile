build-image: 
	docker build -t eshop-controller .
run-container: 
	docker run -d -p 8080:80 -v $(pwd):/var/www/html eshop-controller
