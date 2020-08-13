#!/bin/zsh

echo -e "\e[1;31m----------------------------------------\e[0m"
echo -e "\e[1m---------- Easy Peasy Tool ;) ----------\e[0m"
echo -e "\e[1;31m----------------------------------------\e[0m"
echo -e "\e[1;33m"
echo -e "\t          (__)    "
echo -e "\t          (oo)    "
echo -e "\t   /-------\/     "
echo -e "\t  / |     ||      "
echo -e "\t *  ||----||      "
echo -e "\t    ^^    ^^      "
echo -e "\e[1;31m----------------------------------------\e[0m"

if [ "$1" = "-h" ];
then
    echo -e "\e[1myou can type this commands:\e[0m"
    echo -e "\e[38;5;82mtest"
    echo -e "test:dox"
    echo -e "test:save"
    echo -e "style:check"
    echo -e "style:fix\e[0m"
fi


if [ "$1" = "test" ];
then
    ./vendor/bin/phpunit
fi

if [ "$1" = "test:dox" ];
then
    ./vendor/bin/phpunit --testdox
fi

if [ "$1" = "test:save" ];
then
    ./vendor/bin/phpunit --testdox > results.text
fi

if [ "$1" = "style:check" ];
then
    ./vendor/bin/php-cs-fixer fix --diff --verbose --dry-run
fi

if [ "$1" = "style:fix" ];
then
    ./vendor/bin/php-cs-fixer fix
fi