<?php

$dbParams = array(
    'database'  => 'energieForm',
    'username'  => 'root',
    'password'  => '01az23er',
    'hostname'  => 'localhost',
);


// Build DB Adapter for Master database
return array(
    'service_manager' => array(
        'factories' => array(
            '\Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        ),
        'aliases' => array(
            'db' => '\Zend\Db\Adapter\Adapter'
        ),
    ),
    'db' => array(
        'driver'    => 'pdo',
        'dsn'       => 'mysql:dbname=' . $dbParams['database'] . ';host=' . $dbParams['hostname'],
        'username'  => $dbParams['username'],
        'password'  => $dbParams['password'],
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''),
    ),
);