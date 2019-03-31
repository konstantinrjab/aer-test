Mac OS
```sh
docker run --rm --interactive --tty --volume $PWD/code:/app  composer install
```
Windows
```sh
docker run --rm --interactive --tty --volume "%cd%"/code:/app  composer install
```
```sh
docker-compose up -d
docker exec -it aer-test_php-fpm_1 php yii migrate
docker exec -it aer-test_php-fpm_1 php yii database
```