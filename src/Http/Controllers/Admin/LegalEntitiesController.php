<?php

namespace Railken\LaraOre\Http\Controllers\Admin;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\LegalEntity\LegalEntityManager;

class LegalEntitiesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    public $queryable = [
        'id',
        'name',
        'country_iso',
        'notes',
        'registered_office_address',
        'registered_office_address_id',
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'name',
        'country_iso',
        'notes',
        'registered_office_address',
        'registered_office_address_id',
    ];

    /**
     * Construct.
     */
    public function __construct(LegalEntityManager $manager)
    {
        $this->queryable = array_merge($this->queryable, array_keys(Config::get('ore.legal-entity.attributes')));
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.legal-entity.attributes')));
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
