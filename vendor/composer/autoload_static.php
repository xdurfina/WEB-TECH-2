<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f81964c0ec34da8ed094dedbdd2a90c
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f81964c0ec34da8ed094dedbdd2a90c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f81964c0ec34da8ed094dedbdd2a90c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
