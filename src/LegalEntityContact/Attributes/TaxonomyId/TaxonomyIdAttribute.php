<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\TaxonomyId;

use Illuminate\Support\Collection;
use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Railken\Laravel\Manager\Tokens;

class TaxonomyIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'taxonomy_id';

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
        Tokens::NOT_DEFINED    => Exceptions\LegalEntityContactTaxonomyIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\LegalEntityContactTaxonomyIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\LegalEntityContactTaxonomyIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\LegalEntityContactTaxonomyIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'legal_entity_contact.attributes.taxonomy_id.fill',
        Tokens::PERMISSION_SHOW => 'legal_entity_contact.attributes.taxonomy_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'taxonomy';
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
        return $entity->taxonomy();
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
        return new \Railken\LaraOre\Taxonomy\TaxonomyManager($this->getManager()->getAgent());
    }

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
        return parent::valid($entity, $value) && $value->vocabulary->id === $this->getManager()->getTaxonomyVocabulary()->id;
    }

    /**
     * Update entity value.
     *
     * @param EntityContract       $entity
     * @param ParameterBagContract $parameters
     *
     * @return Collection
     */
    public function update(EntityContract $entity, ParameterBagContract $parameters)
    {
        // "taxonomy_value" may be sent.
        $errors = new Collection();

        if ($parameters->exists('taxonomy_name') && !$parameters->exists('taxonomy_id') && !$parameters->exists('taxonomy')) {
            $m = $this->getRelationManager($entity);

            $criteria = [
                'vocabulary_id' => $this->getManager()->getTaxonomyVocabulary()->id,
                'name'          => $parameters->get('taxonomy_name'),
            ];

            $resource = $m->getRepository()->findOneBy($criteria);

            if (!$resource) {
                $result = $m->create($criteria);

                if (!$result->ok()) {
                    $errors->merge($result->getErrors());
                }

                $resource = $result->getResource();
            }

            $parameters->set('taxonomy', $resource);
        }

        return $errors->merge(parent::update($entity, $parameters));
    }
}
