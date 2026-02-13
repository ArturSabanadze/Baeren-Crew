<?php
session_start();

spl_autoload_register(function ($class) {
    if (str_starts_with($class, 'App\\')) {
        $classPath = str_replace('\\', '/', substr($class, 4));
        $file = __DIR__ . '/../app/' . $classPath . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});
