blog
====

A Symfony project created on August 30, 2017, 3:51 pm.


Simple help in commands if there are any problems:

PHP Fatal error:  Uncaught Symfony\Component\Debug\Exception\ClassNotFoundException: Attempted to load class "FrontendPanelBundle" from namespace "MaximPrihodko\Bundle\FrontendPanelBundle".
Did you forget a "use" statement for another namespace? in /var/www/html/payment_api/app/AppKernel.php:23

    php composer.phar dump-autoload
    
Config file not updating

    bin/console cache:clean -e dev
    bin/console cache:clean -e prod