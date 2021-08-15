<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0da01ba0499f80416f6e09615e2a72e7
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0da01ba0499f80416f6e09615e2a72e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0da01ba0499f80416f6e09615e2a72e7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0da01ba0499f80416f6e09615e2a72e7::$classMap;

        }, null, ClassLoader::class);
    }
}
