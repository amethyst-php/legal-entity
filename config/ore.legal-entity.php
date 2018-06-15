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
        'code_tin'    => \Railken\LaraOre\LegalEntity\Attributes\Codes\International\TIN\TINAttribute::class,
        'code_vat'    => \Railken\LaraOre\LegalEntity\Attributes\Codes\International\VAT\VATAttribute::class,
        'code_it_rea' => \Railken\LaraOre\LegalEntity\Attributes\Codes\IT\REA\REAAttribute::class,
        'code_it_sia' => \Railken\LaraOre\LegalEntity\Attributes\Codes\IT\SIA\SIAAttribute::class,
    ],

    'router' => [
        'prefix'      => '/admin/legal-entities',
        'middlewares' => [
            \Railken\LaraOre\RequestLoggerMiddleware::class,
            'auth:api',
        ],
    ],
];
