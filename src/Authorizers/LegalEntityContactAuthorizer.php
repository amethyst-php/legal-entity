<?php

namespace Railken\Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class LegalEntityContactAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'legal_entity_contact.create',
        Tokens::PERMISSION_UPDATE => 'legal_entity_contact.update',
        Tokens::PERMISSION_SHOW   => 'legal_entity_contact.show',
        Tokens::PERMISSION_REMOVE => 'legal_entity_contact.remove',
    ];
}
