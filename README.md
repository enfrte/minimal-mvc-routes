# minimal-mvc-routes

An attempt at a minimal MVC framework with routing, just to understand a little how it works. 

Uses `$_SERVER['REQUEST_URI']` to process the request. 

It can be run on Apache or with `php -S localhost:2020` for example. You can run the app from another folder, but you will have to specify it in `config.php` unser `'ROOT_FOLDER'`, and also if using Apache, `.htaccess` under `RewriteBase`. 
