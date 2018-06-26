<?php

namespace Railken\LaraOre\LegalEntity;

use Railken\Bag;
use Faker\Factory;
use Railken\LaraOre\Address\AddressFaker;

class LegalEntityFaker
{
    /**
     * @return array
     */
    public static function make()
    {
        $faker = Factory::create();
        
        $bag = new Bag();
        $bag->set('name', $faker->name.str_random(20));
        $bag->set('notes', $faker->realText);
        $bag->set('country_iso', 'US');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        $bag->set('registered_office_address', AddressFaker::make()->toArray());

        return $bag;
    }
}
