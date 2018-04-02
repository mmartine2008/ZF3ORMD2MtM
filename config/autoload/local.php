<?php
/**
 * Local Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. Copy this file without the
 * .dist extension at the end and populate values as needed.
 *
 * @NOTE: This file is ignored from Git by default with the .gitignore included
 * in ZendSkeletonApplication. This is a good practice, as it prevents sensitive
 * credentials from accidentally being committed into version control.
 */

use Doctrine\DBAL\Driver\SQLSrv\Driver as SQLDriver;

return [
        'doctrine' => [
                'connection' => [
                    'orm_default' => [
                        'driverClass' => SQLDriver::class,
                        'params' => [
		            'host' => '127.0.0.1',
                            'dbname' => 'gestor',
                            'user' => 'admin',
                            'port' => '1433',
                            'password' => 'UMwFE4vumKPy'
                        ],
                    ],
                ],
            ],
];
