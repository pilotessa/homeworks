<?php
// Base url
Config::set('baseUrl', '/mvc');

// Default scripts and styles
Config::set('headerScripts', []);
Config::set('headerStyles', [
    'bootstrap' => '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">',
    'site' => '<link href="' . Router::uri('/css/site.css') . '" rel="stylesheet">'
]);
Config::set('bodyScripts', [
    'jquery' => '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>',
    'bootstrap' => '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>',
    'site' => '<script src="' . Router::uri('/js/site.js') . '"></script>',
]);

// Routes
Config::set('routes', [
    'default' => '',
    'admin' => 'admin'
]);
Config::set('defaultRoute', 'default');
Config::set('defaultController', 'site');
Config::set('defaultAction', 'index');

// DB credentials
Config::set('dbHost', 'localhost');
Config::set('dbUser', 'root');
Config::set('dbPassword', '');
Config::set('dbName', 'mvc');

Config::set('salt', 'C-912HIDlqbUfsaeQrtEiU08z4yNSgkl');