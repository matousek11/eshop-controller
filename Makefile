build-image: 
	docker build -t eshop-controller .
first-run-container: 
	docker run --name eshop-controller -d -p 8080:80 -v $(pwd):/var/www/html eshop-controller
start-existing-container:
	docker start eshop-controller
stop-container:
	docker stop eshop-controller

