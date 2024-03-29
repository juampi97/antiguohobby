<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc1545b4ca4ce6492e1b32072a788ec1b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc1545b4ca4ce6492e1b32072a788ec1b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc1545b4ca4ce6492e1b32072a788ec1b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc1545b4ca4ce6492e1b32072a788ec1b::$classMap;

        }, null, ClassLoader::class);
    }
}
