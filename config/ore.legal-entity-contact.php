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

    /*
    |--------------------------------------------------------------------------
    | Http configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the routes
    |
    */
    'http' => [
        'admin' => [
            'enabled'    => true,
            'controller' => Railken\LaraOre\Http\Controllers\Admin\LegalEntityContactsController::class,
            'router'     => [
                'prefix'      => '/admin/legal-entity-contacts',
            ],
        ],
    ],
];
