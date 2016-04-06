# Sglim
A Slim 3 MVC skeleton.
It uses PDO for the model layer and Twig for the view layer. Also it depends of hassankhan/config
library for load config files.
Sglim can be extended 

## Install

All you need to install Sglim is Composer. Run the following command.

``` bash
$ composer create-project "sglim/sglim":"dev-master" app-name
```

## Run the application

Go into the public folder inside the project folder and then 
``` bash
$ cd app-name/public
# run the server
$ php -S 0.0.0.0:8000
```