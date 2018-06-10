<?php

namespace Railken\LaraOre\LegalEntityContact;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class LegalEntityContactManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = LegalEntityContact::class;
    
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
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityContactNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new LegalEntityContactRepository($this));
        $this->setSerializer(new LegalEntityContactSerializer($this));
        $this->setValidator(new LegalEntityContactValidator($this));
        $this->setAuthorizer(new LegalEntityContactAuthorizer($this));

        parent::__construct($agent);
    }
}
