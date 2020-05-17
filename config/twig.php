<?php

use App\GlobalConfig;

$loader = new \Twig\Loader\FilesystemLoader('assets/templates');

$twig = new \Twig\Environment($loader, [
    'cache' => 'var/cache/twig',
    'auto_reload' => true,
    'debug' => true,
]);

define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] .'/' . GlobalConfig::$domain . '/');

$twig->addGlobal('siteUrl', SITE_URL);
$twig->addGlobal('imagesUrl', '/assets/images/');
$twig->addGlobal('imagesUrlPost', '/assets/images/posts/');
$twig->addGlobal('imagesUrlUser', '/assets/images/users/');

$twig->addExtension(new \Twig\Extension\DebugExtension());

GlobalConfig::$twig = $twig;
