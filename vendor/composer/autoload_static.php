<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitecccfc2f55e23c88f5cbd0cd2a6ea47c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'ManuelCardona\\Talent\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ManuelCardona\\Talent\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitecccfc2f55e23c88f5cbd0cd2a6ea47c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitecccfc2f55e23c88f5cbd0cd2a6ea47c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitecccfc2f55e23c88f5cbd0cd2a6ea47c::$classMap;

        }, null, ClassLoader::class);
    }
}
