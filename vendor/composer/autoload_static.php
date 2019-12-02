<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f089798511cfee006924401e9de48bc
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f089798511cfee006924401e9de48bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f089798511cfee006924401e9de48bc::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
