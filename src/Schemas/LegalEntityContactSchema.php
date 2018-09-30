<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Managers\LegalEntityManager;
use Railken\Amethyst\Managers\TaxonomyManager;
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
            Attributes\BelongsToAttribute::make('taxonomy_id')
                ->setRelationName('taxonomy')
                ->setRelationManager(TaxonomyManager::class),
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
