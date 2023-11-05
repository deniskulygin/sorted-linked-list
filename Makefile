SHELL ?= /bin/bash

.PHONY: install
install:
	composer install

.PHONY: phpunit-tests
phpunit-tests: install
	./vendor/bin/phpunit tests/Unit
