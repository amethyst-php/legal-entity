<?php

namespace Railken\LaraOre\LegalEntityContact;

use Railken\Bag;
use Faker\Factory;
use Railken\LaraOre\LegalEntity\LegalEntityFaker;
use Railken\LaraOre\Taxonomy\TaxonomyFaker;
use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\BaseFaker;

class LegalEntityContactFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = LegalEntityContactManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('value', $faker->name);
        $bag->set('notes', $faker->realText);
        $bag->set('legal_entity', LegalEntityFaker::make()->parameters()->toArray());
        $bag->set('taxonomy', TaxonomyFaker::make()->parameters()->toArray());
        $bag->set('taxonomy.vocabulary.name', Config::get('ore.legal-entity-contact.taxonomy'));

        return $bag;
    }
}
