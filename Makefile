imagename := vsvietkov-algorithms
workdir := /algorithms

docker-run := docker run --rm -it -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

install:
	@$(docker-run) composer install && composer dump-autoload

test:
	@$(docker-run) vendor/bin/phpunit tests --colors --testdox

autoload:
	@$(docker-run) composer dump-autoload
