<?php

namespace Railken\LaraOre\LegalEntity\Attributes\CountryIso;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class CountryIsoAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'country_iso';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityCountryIsoNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityCountryIsoNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityCountryIsoNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityCountryIsoNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentity.attributes.country_iso.fill',
        Tokens::PERMISSION_SHOW => 'legalentity.attributes.country_iso.show',
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
        try {
            (new \League\ISO3166\ISO3166())->alpha2($value);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
