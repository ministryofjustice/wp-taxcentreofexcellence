default: build

build:
	bin/build.sh

clean:
	@if [ -d ".git" ]; then git clean -xdf; fi

docker-clean:
	bin/docker-clean.sh

run:
	docker-compose up

bash:
	docker-compose exec wordpress bash

test:
	composer test
