<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class LegalEntityAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'legal-entity.create',
        Tokens::PERMISSION_UPDATE => 'legal-entity.update',
        Tokens::PERMISSION_SHOW   => 'legal-entity.show',
        Tokens::PERMISSION_REMOVE => 'legal-entity.remove',
    ];
}
