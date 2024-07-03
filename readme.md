Goals:
* Освоить основы тестирования PHP-кода с помощью PHPUnit.
* Научиться использовать моки для создания изолированной среды тестирования.
* Проверить синтаксическую корректность кода.

Создайте тестовый класс:
* Определите тестовый класс с именем, соответствующим тестируемому коду.
* Используйте аннотации PHPUnit для определения тестовых методов.

Напишите тестовые методы:
*  Создайте тестовые методы для проверки различных частей кода.
*  Используйте утверждения PHPUnit для проверки ожидаемого поведения кода.
* 
Requirements:
* OS with docker installed on it

RUN FOR FIRST TIME FROM THE ROOT FOLDER

    /bin/bash ./run.sh 

RUN FOR REBUILD

    /bin/bash ./runb.sh

FOR MAKING REPORT:
1. run bash in your docker container 
2. run cd /var/www/html
3. run command: vendor/bin/phpunit tests/ --coverage-html coverage --coverage-filter App

Enjoy report at <Root Folder>/coverage/index.html file

