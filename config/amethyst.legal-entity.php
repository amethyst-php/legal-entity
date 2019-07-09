<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data
    |--------------------------------------------------------------------------
    |
    | Here you can change the table name and the class components.
    |
    */
    'data' => [
        'legal-entity' => [
            'table'      => 'amethyst_legal_entities',
            'comment'    => 'Legal Entity',
            'model'      => Amethyst\Models\LegalEntity::class,
            'schema'     => Amethyst\Schemas\LegalEntitySchema::class,
            'repository' => Amethyst\Repositories\LegalEntityRepository::class,
            'serializer' => Amethyst\Serializers\LegalEntitySerializer::class,
            'validator'  => Amethyst\Validators\LegalEntityValidator::class,
            'authorizer' => Amethyst\Authorizers\LegalEntityAuthorizer::class,
            'faker'      => Amethyst\Fakers\LegalEntityFaker::class,
            'manager'    => Amethyst\Managers\LegalEntityManager::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Taxonomies
    |--------------------------------------------------------------------------
    |
    | Here you may configure taxonomies
    |
    */
    'taxonomies' => [
        ['name' => 'LEGAL_ENTITY'],
    ],

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
            'legal-entity' => [
                'enabled'    => true,
                'controller' => Amethyst\Http\Controllers\Admin\LegalEntitiesController::class,
                'router'     => [
                    'as'     => 'legal-entity.',
                    'prefix' => '/legal-entities',
                ],
            ],
        ],
    ],
];
