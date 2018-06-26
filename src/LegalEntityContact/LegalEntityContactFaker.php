<?php

namespace Railken\LaraOre\LegalEntityContact;

use Railken\Bag;
use Faker\Factory;
use Railken\LaraOre\LegalEntity\LegalEntityFaker;
use Railken\LaraOre\Taxonomy\TaxonomyFaker;
use Illuminate\Support\Facades\Config;

class LegalEntityContactFaker
{
    /**
     * @return array
     */
    public static function make()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('value', $faker->name);
        $bag->set('notes', $faker->realText);
        $bag->set('legal_entity', LegalEntityFaker::make()->toArray());
        $bag->set('taxonomy', TaxonomyFaker::make()->toArray());
        $bag->set('taxonomy.vocabulary.name', Config::get('ore.legal-entity-contact.taxonomy'));

        return $bag;
    }
}
