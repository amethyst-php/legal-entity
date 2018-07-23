<?php

namespace Railken\LaraOre\LegalEntity;

use Faker\Factory;
use Railken\Bag;
use Railken\LaraOre\Address\AddressFaker;
use Railken\Laravel\Manager\BaseFaker;

class LegalEntityFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = LegalEntityManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name.str_random(20));
        $bag->set('notes', $faker->text);
        $bag->set('country_iso', 'US');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        $bag->set('registered_office_address', AddressFaker::make()->parameters()->toArray());

        return $bag;
    }
}
