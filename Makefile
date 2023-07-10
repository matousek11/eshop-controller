build-image: docker build -t eshop-controller .
run-container: docker run -d -p 3000:80 eshop-controller