RoomSaveur
==========

## REQUIRE

git
php5
composer
php5-curl

## HOW TO INSTALL
 
composer install  
php bin/console doctrine:database:create  
php bin/console doctrine:schema:update --force  

## CREATE SUPER ADMIN USER
php bin/console fos:user:create admin --super-admin