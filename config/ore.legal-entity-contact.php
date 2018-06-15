<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    |
    | This is the table used to save configs to the database
    |
    */
    'table' => 'ore_legal_entity_contacts',

    'taxonomy' => 'LEGAL_ENTITY_CONTACT',

    'router' => [
        'prefix'      => '/admin/legal-entity-contacts',
        'middlewares' => [
            \Railken\LaraOre\RequestLoggerMiddleware::class,
            'auth:api',
        ],
    ],
];
