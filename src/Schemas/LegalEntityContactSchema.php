<?php

namespace Railken\Amethyst\Schemas;

use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Attributes as AmethystAttributes;
use Railken\Amethyst\Managers\LegalEntityManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class LegalEntityContactSchema extends Schema
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
            AmethystAttributes\TaxonomyAttribute::make('taxonomy_id', Config::get('amethyst.legal-entity.data.legal-entity-contact.taxonomy'))
                ->setRelationName('taxonomy'),
            Attributes\BelongsToAttribute::make('legal_entity_id')
                ->setRelationName('legal_entity')
                ->setRelationManager(LegalEntityManager::class),
            Attributes\TextAttribute::make('value'),
            Attributes\LongTextAttribute::make('notes'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
