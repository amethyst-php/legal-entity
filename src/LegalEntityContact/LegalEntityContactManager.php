<?php

namespace Railken\LaraOre\LegalEntityContact;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Vocabulary\VocabularyManager;
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
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Notes\NotesAttribute::class,
        Attributes\TaxonomyId\TaxonomyIdAttribute::class,
        Attributes\LegalEntityId\LegalEntityIdAttribute::class,
        Attributes\Value\ValueAttribute::class,
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
        $this->entity = Config::get('ore.legal-entity-contact.entity');
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.legal-entity-contact.attributes')));

        $classRepository = Config::get('ore.legal-entity-contact.repository');
        $this->setRepository(new $classRepository($this));

        $classSerializer = Config::get('ore.legal-entity-contact.serializer');
        $this->setSerializer(new $classSerializer($this));

        $classAuthorizer = Config::get('ore.legal-entity-contact.authorizer');
        $this->setAuthorizer(new $classAuthorizer($this));

        $classValidator = Config::get('ore.legal-entity-contact.validator');
        $this->setValidator(new $classValidator($this));

        parent::__construct($agent);
    }

    /**
     * Retrieve the vocabulary used for the taxonomy attribute.
     *
     * @return \Railken\LaraOre\Vocabulary\Vocabulary
     */
    public function getTaxonomyVocabulary()
    {
        $vocabulary_name = Config::get('ore.legal-entity-contact.taxonomy');

        $vm = new VocabularyManager();
        $resource = $vm->getRepository()->findOneBy(['name' => $vocabulary_name]);

        if ($resource == null) {
            $result = $vm->create(['name' => $vocabulary_name]);

            if (!$result->ok()) {
                throw new \Exception(sprintf('Something did wrong while retrieving vocabulary %s, errors: %s', $vocabulary_name, json_encode($result->getSimpleErrors())));
            }

            $resource = $result->getResource();
        }

        return $resource;
    }
}
