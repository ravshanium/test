Ход выполнения тестового задания
=================================

- установка Yii 1.1.17
----------------------

git@github.com:yiisoft/yii.git

ravsh@ravsh-devOps ~/git_repo/yii1/framework $ ./yiic webapp ../test
Create a Web application under '/home/ravsh/git_repo/yii1/test'? (yes|no) [no]:yes
      mkdir /home/ravsh/git_repo/yii1/test
      mkdir /home/ravsh/git_repo/yii1/test/css
   generate css/main.css
   generate css/bg.gif
   generate css/print.css
   generate css/screen.css
   generate css/ie.css
   generate css/form.css
      mkdir /home/ravsh/git_repo/yii1/test/assets
      mkdir /home/ravsh/git_repo/yii1/test/themes
      mkdir /home/ravsh/git_repo/yii1/test/themes/classic
      mkdir /home/ravsh/git_repo/yii1/test/themes/classic/views
   generate themes/classic/views/.htaccess
      mkdir /home/ravsh/git_repo/yii1/test/themes/classic/views/system
      mkdir /home/ravsh/git_repo/yii1/test/themes/classic/views/site
      mkdir /home/ravsh/git_repo/yii1/test/themes/classic/views/layouts
      mkdir /home/ravsh/git_repo/yii1/test/images
   generate index.php
      mkdir /home/ravsh/git_repo/yii1/test/protected
      mkdir /home/ravsh/git_repo/yii1/test/protected/views
      mkdir /home/ravsh/git_repo/yii1/test/protected/views/site
   generate protected/views/site/error.php
   generate protected/views/site/login.php
   generate protected/views/site/contact.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/views/site/pages
   generate protected/views/site/pages/about.php
   generate protected/views/site/index.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/views/layouts
   generate protected/views/layouts/main.php
   generate protected/views/layouts/column2.php
   generate protected/views/layouts/column1.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/controllers
   generate protected/controllers/SiteController.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/models
   generate protected/models/ContactForm.php
   generate protected/models/LoginForm.php
   generate protected/.htaccess
      mkdir /home/ravsh/git_repo/yii1/test/protected/runtime
      mkdir /home/ravsh/git_repo/yii1/test/protected/config
   generate protected/config/main.php
   generate protected/config/test.php
   generate protected/config/database.php
   generate protected/config/console.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/data
   generate protected/data/schema.mysql.sql
   generate protected/data/schema.sqlite.sql
   generate protected/data/testdrive.db
      mkdir /home/ravsh/git_repo/yii1/test/protected/tests
   generate protected/tests/WebTestCase.php
   generate protected/tests/phpunit.xml
      mkdir /home/ravsh/git_repo/yii1/test/protected/tests/fixtures
      mkdir /home/ravsh/git_repo/yii1/test/protected/tests/functional
   generate protected/tests/functional/SiteTest.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/tests/unit
   generate protected/tests/bootstrap.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/tests/report
   generate protected/yiic
   generate protected/yiic.bat
      mkdir /home/ravsh/git_repo/yii1/test/protected/messages
      mkdir /home/ravsh/git_repo/yii1/test/protected/commands
      mkdir /home/ravsh/git_repo/yii1/test/protected/commands/shell
      mkdir /home/ravsh/git_repo/yii1/test/protected/migrations
      mkdir /home/ravsh/git_repo/yii1/test/protected/components
   generate protected/components/Controller.php
   generate protected/components/UserIdentity.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/extensions
   generate protected/yiic.php
      mkdir /home/ravsh/git_repo/yii1/test/protected/vendor
   generate index-test.php

Your application has been created successfully under /home/ravsh/git_repo/yii1/test.

-----------------------------------------------------------------------------


Тестовое задание для программиста PHP
---------------------------------------
Кандидату предлагается выполнить тестовое задание к обсуждению на собеседовании.

Для интернет-системы по продаже книг в интернете необходимо разработать сервис (web сервис back end по усмотрению кандидата) позволяющий выполнять следующие базовые операции:

1. Получить перечень книг как результат поиска по названию, по автору, в том числе, по соавторам.
2. Сформировать заказ (передать ID по версии поставщика, передать количество, получить номер заказа поставщика)
3. Оформить заказ

Все операции открыты для доступа со стороны фронтенда.

Сервис в свою очередь обеспечивает соединение с API удаленного поставщика услуг (в нашем случае - поставщика продукции для магазина).

Реализация API удаленного поставщика услуг не требуется, достаточно будет моделировать данные ответа в разрабатываемом сервесе.

Реализация сервиса выполняется как web-service, с использованием PHP и фреймворка Yii (Yii желательно, но не является обязательным условием). Реализация фронтенда остается на усмотрение кандидата.

Основное требование к сервису - обеспечить универсальность вызовов со стороны фронтенда, с тем, чтобы в перспективе расширить набор поставщиков обслуживаемых Сервисом.
-------------------------------------------------------------------------


Начинаем писать веб-сервис
-------------------------------------------------------------------------
- Гуглим: http://yiiframework.ru/doc/guide/ru/topics.webservice

- читаем Примечание:Для работы CWebService требуется расширение PHP SOAP. Убедитесь, что оно включено, прежде, чем пробовать примеры, описанные далее.

- проверяем Soap
ravsh@ravsh-devOps ~/git_repo/yii1/framework $ php -i | grep -i soap
soap
Soap Client => enabled
Soap Server => enabled
soap.wsdl_cache => 1 => 1
soap.wsdl_cache_dir => /tmp => /tmp
soap.wsdl_cache_enabled => 1 => 1
soap.wsdl_cache_limit => 5 => 5
soap.wsdl_cache_ttl => 86400 => 86400

ravsh@ravsh-devOps ~/git_repo/yii1/framework $ apt-cache search php | grep -i soap
libnusoap-php - SOAP toolkit for PHP
php-soap - SOAP Client/Server class for PHP

- т.к. у меня mint то если не установлено выполняем рекомендацию:
$ sudo apt-get install php-soap

- далее запускаю веб-сервер на php: 
ravsh@ravsh-devOps ~/git_repo/yii1 $ php -S localhost:8889

наш тест будет доступен по запросу в броузере http://localhost:8889/test/