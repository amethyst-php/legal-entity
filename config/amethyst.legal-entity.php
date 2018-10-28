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
        'legal-entity-contact' => [
            'table'      => 'amethyst_legal_entity_contacts',
            'comment'    => 'Legal Entity Contact',
            'model'      => Railken\Amethyst\Models\LegalEntityContact::class,
            'schema'     => Railken\Amethyst\Schemas\LegalEntityContactSchema::class,
            'repository' => Railken\Amethyst\Repositories\LegalEntityContactRepository::class,
            'serializer' => Railken\Amethyst\Serializers\LegalEntityContactSerializer::class,
            'validator'  => Railken\Amethyst\Validators\LegalEntityContactValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\LegalEntityContactAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\LegalEntityContactFaker::class,
            'manager'    => Railken\Amethyst\Managers\LegalEntityContactManager::class,
            'taxonomy'   => 'LEGAL_ENTITY_CONTACT',
        ],
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
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\Admin\LegalEntitiesController::class,
                'router'      => [
                    'as'        => 'legal-entity.',
                    'prefix'    => '/legal-entities',
                ],
            ],
            'legal-entity-contact' => [
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\Admin\LegalEntityContactsController::class,
                'router'      => [
                    'as'        => 'legal-entity-contact.',
                    'prefix'    => '/legal-entity-contacts',
                ],
            ],
        ],
    ],
];
