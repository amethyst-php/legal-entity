<?php

namespace Railken\LaraOre\Http\Controllers;

use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\LegalEntity\LegalEntityManager;
use Illuminate\Support\Facades\Config;

class LegalEntitiesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    protected static $query = [
        'id',
        'name',
        'country_iso',
        'notes',
        'created_at',
        'updated_at',
    ];

    protected static $fillable = [
        'name',
        'country_iso',
        'notes',
    ];

    /**
     * Construct.
     */
    public function __construct(LegalEntityManager $manager)
    {
        self::$query = array_merge(self::$query, array_keys(Config::get('ore.legal-entity.attributes')));
        self::$fillable = array_merge(self::$fillable, array_keys(Config::get('ore.legal-entity.attributes')));
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
