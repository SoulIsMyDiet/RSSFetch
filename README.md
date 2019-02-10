
Installation
------------

clone or download app to your folder.

Go into downloaded or cloned folder and type: 
```
composer install
```

Usage
-----
There are two commands you can use in the terminal. Just go into the main folder and type one of the commands:

```
php src/console.php csv:simple URL PATH
php src/console.php csv:extended URL PATH
```
where URL PATH is an adress to page with feed content for example:
 ```
 php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main
 ```
The first command is to fetch and write data into csv file, second is to fetch and append data into csv file

You can change your destination file with the simple config file: config.php by changing the PATH const






Testing
-------
you can test app with 3 possible commands from main folder in terminal

``` bash
 vendor/bin/phpunit tests/generalTest.php
 vendor/bin/phpunit tests/writeTest.php
 vendor/bin/phpunit tests/appendTest.php
```
