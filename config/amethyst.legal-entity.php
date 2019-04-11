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
            'model'      => Railken\Amethyst\Models\LegalEntity::class,
            'schema'     => Railken\Amethyst\Schemas\LegalEntitySchema::class,
            'repository' => Railken\Amethyst\Repositories\LegalEntityRepository::class,
            'serializer' => Railken\Amethyst\Serializers\LegalEntitySerializer::class,
            'validator'  => Railken\Amethyst\Validators\LegalEntityValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\LegalEntityAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\LegalEntityFaker::class,
            'manager'    => Railken\Amethyst\Managers\LegalEntityManager::class,
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
                'controller' => Railken\Amethyst\Http\Controllers\Admin\LegalEntitiesController::class,
                'router'     => [
                    'as'     => 'legal-entity.',
                    'prefix' => '/legal-entities',
                ],
            ],
        ],
    ],
];
