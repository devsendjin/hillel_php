# Блог
### ORM Doctrine. Миграции. Связи. Внешние ключи. MyIsam vs InnoDB

````sh
git clone https://github.com/jsCodev/hillel_php.git && \
cd hillel_php && \
git checkout l12-homework

docker-compose up

localhost:8085

В apache контейнере:
composer dump-autoload
composer install

vendor/bin/doctrine-migrations execute --up 20200522154921
vendor/bin/doctrine-migrations execute --up 20200522155808

Если нужно править стили / js с помощью сборщика (gulp):
npm install && gulp
````
