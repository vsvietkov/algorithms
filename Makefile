imagename := vsvietkov-algorithms
workdir := /algorithms

docker-run := docker run --rm -it -v ${PWD}:/$(workdir) $(imagename)

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

install:
	@$(docker-run) composer install && composer dump-autoload

test:
	@$(docker-run) vendor/bin/phpunit tests --colors --testdox --coverage-html results/phpunit/ --coverage-clover results/phpunit/coverage.xml --log-junit results/phpunit/phpunit.xml

autoload:
	@$(docker-run) composer dump-autoload