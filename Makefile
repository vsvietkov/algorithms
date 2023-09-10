imagename := vsvietkov-data-structures
workdir := /data-structures
tty-options := -it # Enable color output locally, disable for github

docker-run := docker run $(tty-options) --rm -v ${PWD}:/$(workdir) $(imagename)
phpcs-settings := --standard=vendor/vsvietkov/phpcs-rules/src/ruleset.xml --warning-severity=6 -p --colors src/ tests/

docker-build:
	@docker build --build-arg workdir=$(workdir) . -t $(imagename)

install:
	@$(docker-run) bash -c "composer install && composer dump-autoload"

update:
	@$(docker-run) bash -c "composer update && composer dump-autoload"

test:
	@$(docker-run) vendor/bin/phpunit tests --colors --testdox --coverage-html results/phpunit/ --coverage-clover results/phpunit/coverage.xml --log-junit results/phpunit/phpunit.xml --log-events-verbose-text results/phpunit/verbose-log.txt

autoload:
	@$(docker-run) composer dump-autoload

run-cs:
	@$(docker-run) vendor/bin/phpcs ${phpcs-settings}

fix-cs:
	@$(docker-run) vendor/bin/phpcbf ${phpcs-settings}
