<?php
/**
 * This file will only be needed if you didn't set up a Doctrine-Connection yet
 */
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params'      => array(
                    'host'     => '127.0.0.1',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '01az23er',
                    'dbname'   => 'energieForm'
                )
            )
        )
    )
);