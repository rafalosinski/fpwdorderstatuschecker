<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit192780d679a6c9e2d47fd58d31f37830
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
            'Timber\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Timber\\' => 
        array (
            0 => __DIR__ . '/..' . '/timber/timber/lib',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/asm89/twig-cache-extension/lib',
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'R' => 
        array (
            'Routes' => 
            array (
                0 => __DIR__ . '/..' . '/upstatement/routes',
            ),
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FpwdOrderStatusChecker' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker.php',
        'FpwdOrderStatusCheckerActivator' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker-activator.php',
        'FpwdOrderStatusCheckerAdmin' => __DIR__ . '/../..' . '/admin/class-fpwdorderstatuschecker-admin.php',
        'FpwdOrderStatusCheckerDeactivator' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker-deactivator.php',
        'FpwdOrderStatusCheckerI18n' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker-i18n.php',
        'FpwdOrderStatusCheckerLoader' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker-loader.php',
        'FpwdOrderStatusCheckerPublic' => __DIR__ . '/../..' . '/public/class-fpwdorderstatuschecker-public.php',
        'FpwdOrderStatusCheckerWidget' => __DIR__ . '/../..' . '/includes/class-fpwdorderstatuschecker-widget.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit192780d679a6c9e2d47fd58d31f37830::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit192780d679a6c9e2d47fd58d31f37830::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit192780d679a6c9e2d47fd58d31f37830::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit192780d679a6c9e2d47fd58d31f37830::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit192780d679a6c9e2d47fd58d31f37830::$classMap;

        }, null, ClassLoader::class);
    }
}
