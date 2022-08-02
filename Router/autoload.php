<?php
spl_autoload_register(function ($class_name) {
    $folders = [
        'Models/',
        'Models/Manager/',
        'Controller/',
        'Controller/Security',
        'Router/'

    ];

    foreach ($folders as $folder){
        if(file_exists($folder.$class_name.'.php')){
            require $folder.$class_name.'.php';
            return;
        }
    }
});


