<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\Value;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class ValueAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'value';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityContactValueNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityContactValueNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityContactValueNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityContactValueNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentitycontact.attributes.value.fill',
        Tokens::PERMISSION_SHOW => 'legalentitycontact.attributes.value.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return v::length(1, 255)->validate($value);
    }
}