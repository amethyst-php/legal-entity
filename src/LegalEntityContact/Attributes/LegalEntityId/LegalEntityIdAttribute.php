<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\LegalEntityId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class LegalEntityIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'legal_entity_id';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = true;

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityContactLegalEntityIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityContactLegalEntityIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityContactLegalEntityIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityContactLegalEntityIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legal_entity_contact.attributes.legal_entity_id.fill',
        Tokens::PERMISSION_SHOW => 'legal_entity_contact.attributes.legal_entity_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'legal_entity';
    }

    /**
     * Retrieve eloquent relation.
     *
     * @param EntityContract $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->legal_entity();
    }

    /**
     * Retrieve relation manager.
     *
     * @param EntityContract $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new \Railken\LaraOre\LegalEntity\LegalEntityManager($this->getManager()->getAgent());
    }
}
