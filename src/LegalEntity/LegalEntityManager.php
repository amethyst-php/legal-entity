<?php

namespace Railken\LaraOre\LegalEntity;

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
        Attributes\DeletedAt\DeletedAtAttribute::class
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
        $this->setRepository(new LegalEntityRepository($this));
        $this->setSerializer(new LegalEntitySerializer($this));
        $this->setValidator(new LegalEntityValidator($this));
        $this->setAuthorizer(new LegalEntityAuthorizer($this));

        parent::__construct($agent);
    }
}
