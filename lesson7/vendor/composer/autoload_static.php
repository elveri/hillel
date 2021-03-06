<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd1d30170ffe58673e2081a473db0c47
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Cache\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd1d30170ffe58673e2081a473db0c47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd1d30170ffe58673e2081a473db0c47::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
