<?php
return [
    'zf-versioning' => [
        'default_version' => 1,
        'uri' => [
            0 => 'client.rpc.ping',
        ],
    ],
    'controllers' => [
        'factories' => [
            'Client\\V1\\Rpc\\Ping\\Controller' => \Client\V1\Rpc\Ping\PingControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'client.rpc.ping' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/ping',
                    'defaults' => [
                        'controller' => 'Client\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ],
                ],
            ],
        ],
    ],
    'zf-rpc' => [
        'Client\\V1\\Rpc\\Ping\\Controller' => [
            'service_name' => 'Ping',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'client.rpc.ping',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Client\\V1\\Rpc\\Ping\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Client\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.client.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Client\\V1\\Rpc\\Ping\\Controller' => [
                0 => 'application/vnd.client.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
];
