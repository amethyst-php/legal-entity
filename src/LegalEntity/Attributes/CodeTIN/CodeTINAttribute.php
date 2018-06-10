<?php

namespace Railken\LaraOre\LegalEntity\Attributes\CodeTIN;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class CodeTINAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'code_tin';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityCodeTINNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityCodeTINNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityCodeTINNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityCodeTINNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentity.attributes.code_tin.fill',
        Tokens::PERMISSION_SHOW => 'legalentity.attributes.code_tin.show',
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
