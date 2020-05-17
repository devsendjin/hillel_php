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

vendor/bin/doctrine orm:schema-tool:create
vendor/bin/doctrine-migrations execute --up 20200509231922

Если нужно править стили / js с помощью сборщика (gulp):
npm install && gulp
````
