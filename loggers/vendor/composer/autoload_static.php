<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdd0f9ef30ffd2c84363a5bd5212b0e7c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'D' => 
        array (
            'DawM\\Loggers\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'DawM\\Loggers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdd0f9ef30ffd2c84363a5bd5212b0e7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdd0f9ef30ffd2c84363a5bd5212b0e7c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdd0f9ef30ffd2c84363a5bd5212b0e7c::$classMap;

        }, null, ClassLoader::class);
    }
}
