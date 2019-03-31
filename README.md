```sh
docker run --rm --interactive --tty \
  --volume $PWD/code:/app \
  composer install
  
docker-compose
docker exec -it aer-test_php-fpm_1 php yii migrate
docker exec -it aer-test_php-fpm_1 php yii database
