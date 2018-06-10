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
        'code_tin'    => \Railken\LaraOre\LegalEntity\Attributes\CodeTIN\CodeTINAttribute::class,
        'code_vat'    => \Railken\LaraOre\LegalEntity\Attributes\CodeVAT\CodeVATAttribute::class,
        'code_it_rea' => \Railken\LaraOre\LegalEntity\Attributes\CodeITREA\CodeITREAAttribute::class,
        'code_it_sia' => \Railken\LaraOre\LegalEntity\Attributes\CodeITSIA\CodeITSIAAttribute::class,
    ],

    'router' => [
        'prefix'      => 'admin/legal-entities',
        'middlewares' => [
            \Railken\LaraOre\RequestLoggerMiddleware::class,
            'auth:api',
        ],
    ],
];
