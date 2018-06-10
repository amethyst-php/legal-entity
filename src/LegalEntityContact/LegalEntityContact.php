<?php

namespace Railken\LaraOre\LegalEntityContact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\LaraOre\Taxonomy\Taxonomy;
use Railken\LaraOre\LegalEntity\LegalEntity;

class LegalEntityContact extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notes', 'value'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = \Illuminate\Support\Facades\Config::get('ore.legal-entity-contact.table');
    }

    /**
     * Get works.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class);
    }

    /**
     * Get works.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function legal_entity()
    {
        return $this->belongsTo(LegalEntity::class);
    }
}
