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
    'table' => 'ore_legal_entities',

    'attributes' => [
        'code_tin' => \Railken\LaraOre\LegalEntity\Attributes\CodeTIN\CodeTINAttribute::class,
        'code_vat' => \Railken\LaraOre\LegalEntity\Attributes\CodeVAT\CodeVATAttribute::class,
    ],

    'router' => [
        'prefix'      => 'admin/legal-entities',
        'middlewares' => [
            \Railken\LaraOre\RequestLoggerMiddleware::class,
            'auth:api',
        ],
    ],
];
