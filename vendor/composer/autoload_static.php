<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e9d4c6f858d6b638e68caa1e864220c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'App\\controllers\\ArticlesController' => __DIR__ . '/../..' . '/controllers/ArticlesController.php',
        'App\\models\\Article' => __DIR__ . '/../..' . '/models/Article.php',
        'App\\models\\ArticleManager' => __DIR__ . '/../..' . '/models/ArticleManager.php',
        'App\\models\\DbManager' => __DIR__ . '/../..' . '/models/DbManager.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e9d4c6f858d6b638e68caa1e864220c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e9d4c6f858d6b638e68caa1e864220c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0e9d4c6f858d6b638e68caa1e864220c::$classMap;

        }, null, ClassLoader::class);
    }
}
