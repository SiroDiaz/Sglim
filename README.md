# Sglim
A Slim 3 MVC skeleton.
It uses PDO for the model layer and Twig for the view layer. Also it depends of hassankhan/config
library for load config files and the symfony/console package for the Sglim command line tool.
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

## Command line

Sglim allows you many shortcuts to make things fast. Right now there are 3 main commands:

**Generate a new route file** if the route doesn't exist.

``` bash
$ php sglim make:route route-name
```

**Generate a new model**

``` bash
$ php sglim make:model model-name
```

**Generate a new view** HTML5 file

``` bash
$ php sglim make:view view-name
```

## FAQ / Contact

**Question 1**: Can i use an ORM instead of PDO extension?
*Yes, you can. I tried using Eloquent(Lavel ORM) and i had to do minor changes in the index.php file.
Only i had to add a charset option in the configuration file but it works properly. It is pretty simple
and if you love ORMs you can mix Sglim with the ORM that you want.*

**Question 2**: Why doesn't Sglim include all Slim package like [Slim-Csrf](https://github.com/slimphp/Slim-Csrf)?
*Because the Sglim idea is to keep it simple. But maybe in future commits i will set them to Sglim package*

You can contact with me through Twitter([@Siro_Diaz](https://twitter.com/siro_diaz)) or email me &lt;siro_diaz@yahoo.com&gt;