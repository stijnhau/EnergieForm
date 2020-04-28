<?php
include __DIR__ . '/../vendor/autoload.php';
$host = "localhost";
$port = "3306";
$user   = "root";
$password = "01az23er";
$dbname = "energieForm";
// include '../config/autoload/connection.php';

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(__DIR__ . '/Entities'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$connectionParams = array(
    'driver' => 'pdo_mysql',
    'host' => $host,
    'port' => $port,
    'user' => $user,
    'password' => $password,
    'dbname' => $dbname,
    'charset' => 'utf8',
);
$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);
// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $em->getConnection()->getSchemaManager()
);
$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em);

$metadata = $cmf->getAllMetadata();
foreach ($metadata as $metadataData) {
    $metadataData->lifecycleCallbacks = true;
    $metadataData->name = "Application\Model\Entity\\" . $metadataData->name;

    $mappings = array();
    foreach ($metadataData->associationMappings as $associationMappings) {
        $associationMappings['targetEntity'] = "Application\Model\Entity\\" . $associationMappings['targetEntity'];
        $mappings[] = $associationMappings;
    }

    $metadataData->associationMappings = $mappings;
}

$generator = new Doctrine\ORM\Tools\EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->setRegenerateEntityIfExists(true);
$generator->generate($metadata, __DIR__ . '/../module/Application/src');
print 'Done!' . PHP_EOL;
