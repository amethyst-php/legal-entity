<?php

namespace Railken\LaraOre\LegalEntity\Attributes\Codes\IT\SIA;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class SIAAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'code_it_sia';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntitySIANotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntitySIANotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntitySIANotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntitySIANotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentity.attributes.code_it_sia.fill',
        Tokens::PERMISSION_SHOW => 'legalentity.attributes.code_it_sia.show',
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
