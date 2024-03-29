<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb4ecf0ee454aab9a9c7274a8239a531
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Route\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Route\\' => 
        array (
            0 => __DIR__ . '/../..' . '/route',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb4ecf0ee454aab9a9c7274a8239a531::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb4ecf0ee454aab9a9c7274a8239a531::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
