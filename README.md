Installation
============

~~~
$ docker-compose up -d
$ docker run --rm -it -v $PWD:/app composer install
$ docker-compose exec php yii migrate
~~~

Open the https://127.0.0.1:8000 url in your browser.