make:

composer:
	curl -sS https://getcomposer.org/installer | php

phpunit:
	curl -o phpunit.phar https://phar.phpunit.de/phpunit.phar
	chmod +x phpunit.phar

test:
	./phpunit.phar
