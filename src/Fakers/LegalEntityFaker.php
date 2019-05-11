<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Illuminate\Support\Facades\Config;
use Railken\Bag;
use Railken\Lem\Faker;

class LegalEntityFaker extends Faker
{
    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name.str_random(20));
        $bag->set('country', 'US');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        $bag->set('registered_office_address', AddressFaker::make()->parameters()->toArray());
        $bag->set('type', TaxonomyFaker::make()->parameters()->toArray());
        $bag->set('type.parent.name', Config::get('amethyst.legal-entity.taxonomies.0.name'));

        return $bag;
    }
}
