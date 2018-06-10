<?php

namespace Railken\LaraOre\LegalEntity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Railken\LaraOre\Address\Address;
use Railken\Laravel\Manager\Contracts\EntityContract;

class LegalEntity extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'notes',
        'country_iso',
        'registered_office_address_id',
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
        $this->fillable = array_merge($this->fillable, array_keys(Config::get('ore.legal-entity.attributes')));
        $this->table = Config::get('ore.legal-entity.table');
        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registered_office_address()
    {
        return $this->belongsTo(Address::class);
    }
}
