<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\GlobalConfig;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$conn = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '1',
    'host' => 'mysql',
    'dbname' => 'blog',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

GlobalConfig::$entityManager = $entityManager;