projectName = ci4-api-bonus-register

build:
	docker build -t $(projectName) .
up-f:
	docker-compose up --build --no-recreate -d
up:
	docker-compose up -d
stop:
	docker-compose stop