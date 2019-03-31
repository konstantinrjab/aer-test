#!/usr/bin/env bash
docker run --rm --interactive --tty --volume $PWD/code:/app  composer install \
&& docker-compose up -d \
&& docker exec -it riabchenko-test-php php yii migrate \
&& docker exec -it riabchenko-test-php php yii database