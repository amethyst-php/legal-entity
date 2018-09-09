<?php

namespace Railken\LaraOre\LegalEntity\Attributes\RegisteredOfficeAddressId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class RegisteredOfficeAddressIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'registered_office_address_id';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityRegisteredOfficeAddressIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityRegisteredOfficeAddressIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityRegisteredOfficeAddressIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityRegisteredOfficeAddressIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legalentity.attributes.registered_office_address_id.fill',
        Tokens::PERMISSION_SHOW => 'legalentity.attributes.registered_office_address_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'registered_office_address';
    }

    /**
     * Retrieve eloquent relation.
     *
     * @param \Railken\LaraOre\LegalEntity\LegalEntity $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->registered_office_address();
    }

    /**
     * Retrieve relation manager.
     *
     * @param \Railken\LaraOre\LegalEntity\LegalEntity $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new \Railken\LaraOre\Address\AddressManager($this->getManager()->getAgent());
    }
}
