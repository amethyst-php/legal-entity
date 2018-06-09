<?php

namespace Railken\LaraOre\LegalEntity;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class LegalEntityAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'legal_entity.create',
        Tokens::PERMISSION_UPDATE => 'legal_entity.update',
        Tokens::PERMISSION_SHOW   => 'legal_entity.show',
        Tokens::PERMISSION_REMOVE => 'legal_entity.remove',
    ];
}
