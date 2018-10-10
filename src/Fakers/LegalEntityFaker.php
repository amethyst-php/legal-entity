<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
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
        $bag->set('notes', $faker->text);
        $bag->set('country', 'US');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        $bag->set('registered_office_address', AddressFaker::make()->parameters()->toArray());

        return $bag;
    }
}
