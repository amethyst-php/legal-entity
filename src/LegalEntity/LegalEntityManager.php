<?php

namespace Railken\LaraOre\LegalEntity;

use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class LegalEntityManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = LegalEntity::class;

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Notes\NotesAttribute::class,
        Attributes\CountryIso\CountryIsoAttribute::class,
        Attributes\RegisteredOfficeAddressId\RegisteredOfficeAddressIdAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->entity = Config::get('ore.legal-entity.entity');
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.legal-entity.attributes')));

        $classRepository = Config::get('ore.legal-entity.repository');
        $this->setRepository(new $classRepository($this));

        $classSerializer = Config::get('ore.legal-entity.serializer');
        $this->setSerializer(new $classSerializer($this));

        $classAuthorizer = Config::get('ore.legal-entity.authorizer');
        $this->setAuthorizer(new $classAuthorizer($this));

        $classValidator = Config::get('ore.legal-entity.validator');
        $this->setValidator(new $classValidator($this));

        parent::__construct($agent);
    }
}
