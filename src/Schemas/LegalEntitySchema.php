<?php

namespace Amethyst\Schemas;

use Amethyst\Attributes as AmethystAttributes;
use Amethyst\Managers\AddressManager;
use Illuminate\Support\Facades\Config;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class LegalEntitySchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true),
            AmethystAttributes\TaxonomyAttribute::make('type_id', Config::get('amethyst.legal-entity.taxonomies.0.name'))
                ->setRelationName('type')
                ->setRequired(true),
            AmethystAttributes\CountryAttribute::make('country'),
            Attributes\BelongsToAttribute::make('registered_office_address_id')
                ->setRelationName('registered_office_address')
                ->setRelationManager(AddressManager::class),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
