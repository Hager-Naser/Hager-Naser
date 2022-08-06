<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit983c4ad4111147bf9fa9225f91343622
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit983c4ad4111147bf9fa9225f91343622::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit983c4ad4111147bf9fa9225f91343622::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit983c4ad4111147bf9fa9225f91343622::$classMap;

        }, null, ClassLoader::class);
    }
}