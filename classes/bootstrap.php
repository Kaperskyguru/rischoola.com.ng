<?php
    // Autoload Core Classes
    spl_autoload_register(function($className)
    {
        require_once 'controllers/'.$className.'.php';
    });
