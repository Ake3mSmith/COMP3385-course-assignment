<?php
function model_autoloader($class_name)
{
    $file = 'models/' . $class_name . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}

function controller_autoloader($class_name)
{
    $file = 'controllers/' . $class_name . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}

// add a new autoloader by passing a callable into spl_autoload_register()
spl_autoload_register('model_autoloader');
spl_autoload_register('controller_autoloader');

$URC = new UserRegistrationController();
