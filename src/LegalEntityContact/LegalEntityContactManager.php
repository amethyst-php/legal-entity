<?php

namespace Railken\LaraOre\LegalEntityContact;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Railken\LaraOre\Vocabulary\VocabularyManager;
use Illuminate\Support\Facades\Config;

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
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Notes\NotesAttribute::class,
        Attributes\TaxonomyId\TaxonomyIdAttribute::class,
        Attributes\LegalEntityId\LegalEntityIdAttribute::class,
        Attributes\Value\ValueAttribute::class
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

    /**
     * Retrieve the vocabulary used for the taxonomy attribute
     *
     * @return \Railken\LaraOre\Vocabulary\Vocabulary
     */
    public function getTaxonomyVocabulary()
    {
        $vocabulary_name = Config::get('ore.legal-entity-contact.taxonomy');

        $vm = new VocabularyManager();
        $resource = $vm->getRepository()->findOneBy(['name' => $vocabulary_name]);

        if (!$resource) {
            $result = $vm->create(['name' => $vocabulary_name]);

            if (!$result->ok()) {
                throw new \Exception(sprintf("Something did wrong while retrieving vocabulary %s, errors: %s", $vocabulary_name, json_encode($result->getSimpleErrors())));
            }

            $resource = $result->getResource();
        }

        return $resource;
    }
}
