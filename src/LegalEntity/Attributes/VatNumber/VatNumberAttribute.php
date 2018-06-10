<?php

namespace Railken\LaraOre\LegalEntity\Attributes\VatNumber;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class VatNumberAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'vat_number';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityVatNumberNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityVatNumberNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityVatNumberNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityVatNumberNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentity.attributes.vat_number.fill',
        Tokens::PERMISSION_SHOW => 'legalentity.attributes.vat_number.show',
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
