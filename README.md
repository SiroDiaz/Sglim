# Sglim
A Slim 3 MVC skeleton.
It uses PDO for the model layer and Twig for the view layer. Also it depends of hassankhan/config
library for load config files.
Sglim can be extended adding few neccesary packages because Sglim goal is keep simple the Slim
configuration.

## Why Sglim?

There are many Slim framework skeletons but i don't see neither that like me. So i have decided to
build my own "MVC" skeleton for small/medium APIs and dynamic websites when you need speed and low complexity
in your apps.

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

## Folders structure

Sglim uses different folders to organize your project based in other frameworks structure.

- **App**, where is hosted main application folders as *Models*, *Views*, *Routes*, *Api* and Middlewares.
- **config**, where you can find two configuration files: *config_development* and *config_production*. Both cantains database and Slim configuration and you can also set your Facebook, Twitter and other app secret keys.
- **public**. The folder where are all application frontend files.
- **storage**. Storage contains all rendered all Twig views(cache) and log files.
