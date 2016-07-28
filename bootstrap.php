<?php
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

$loader = require(__DIR__.'/vendor/autoload.php');

// --------------------------------------------------------------------

$loader->add('Documents', __DIR__.'/doctrine/Documents');

$connection = new Connection('mongodb://mongodb');

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/doctrine/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/doctrine/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/doctrine/Documents'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create($connection, $config);
