<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Illuminate\Support\Facades\Config;
use Railken\Bag;
use Railken\Lem\Faker;

class LegalEntityContactFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('value', $faker->name);
        $bag->set('notes', $faker->text);
        $bag->set('legal_entity', LegalEntityFaker::make()->parameters()->toArray());
        $bag->set('taxonomy', TaxonomyFaker::make()->parameters()->toArray());
        $bag->set('taxonomy.parent.name', Config::get('amethyst.legal-entity.data.legal-entity-contact.taxonomy'));

        return $bag;
    }
}
