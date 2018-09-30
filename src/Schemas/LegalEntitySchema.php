<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Attributes as AmethystAttributes;
use Railken\Amethyst\Managers\AddressManager;
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
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('notes'),
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
