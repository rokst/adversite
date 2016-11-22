Training assignment for a PHP developer
==========
Create a small web application that displays advertisements posted by users on its home page. It should somewhat resemble websites such as craigslist.org or skelbiu.lt, but have much less features.

Requirements for the Application

- Both registered and unregistered users should see a list of all posted advertisements on the home page
- Each advertisement in the list should display a posting date, title, detailed description and username of the poster
- New users should be able to register by clicking "New User Registration" link on the homepage
- Existing users should be able to log in
- Logged in users should be able to post new advertisements. Posted advertisements should immediately appear on the home page
- Logged in users should be able to see their own advertisements list
- Logged in users should be able to log out
- Deployment instructions

Suggested Technologies

- Framework - Symfony
- Frontend - Bootstrap
- Database - MySQL

Requirements
------------

  * PHP 5 or higher;    
  * MySql
  * gulp
  * and the [usual Symfony application requirements](http://symfony.com/doc/current/reference/requirements.html).

Installation
------------

Download and install this application usig Git and Composer:

```bash
$ git clone https://github.com/rokst/advertise.git
$ cd advertise/
$ composer install
$ npm install
$ bower install
$ gulp
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
$ php bin/console doctrine:fixtures:load
```

Usage
-----

```bash
$ cd advertise/
$ php bin/console server:run
```

This command will start a web server for the Symfony application. Now you can
access the application in your browser at <http://localhost:8000>. You can
stop the built-in web server by pressing `Ctrl + C` while you're in the
terminal.

- - - - - - -  
###### &copy; 2016 [Rokas Stašys](https://github.com/rokst)