<?php

namespace Railken\LaraOre\Tests\LegalEntityContact;

use Railken\Bag;
use Railken\LaraOre\LegalEntity\LegalEntityManager;
use Railken\LaraOre\LegalEntityContact\LegalEntityContactManager;
use Railken\LaraOre\Taxonomy\TaxonomyManager;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\LegalEntityServiceProvider::class,
        ];
    }

    public function newLegalEntity()
    {
        $bag = new Bag();
        $bag->set('name', str_random(40));
        $bag->set('notes', str_random(40));
        $bag->set('country_iso', 'IT');
        $bag->set('vat_number', '203458239B01');
        $bag->set('code_vat', '203458239B01');
        $bag->set('code_tin', '203458239B01');
        
        $lem = new LegalEntityManager();

        return $lem->create($bag)->getResource();
    }

    public function newTaxonomy()
    {
        $lecm = new LegalEntityContactManager();

        $bag = new Bag();
        $bag->set('name', 'Ban');
        $bag->set('vocabulary_id', $lecm->getTaxonomyVocabulary()->id);

        $le = new TaxonomyManager();

        return $le->create($bag)->getResource();
    }

    /**
     * Retrieve correct Bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new Bag();
        $bag->set('value', str_random(40));
        $bag->set('notes', str_random(40));
        $bag->set('taxonomy_id', $this->newTaxonomy()->id);
        //$bag->set('taxonomy_name', "email");
        $bag->set('legal_entity_id', $this->newLegalEntity()->id);

        return $bag;
    }

    /**
     * Get parameters with taxonomy name.
     *
     * @return Bag
     */
    public function getParametersWithTaxonomyName()
    {
        return $this->getParameters()->remove('taxonomy_id')->set('taxonomy_name', 'email');
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\LegalEntityServiceProvider', '--force' => true]);
        $this->artisan('lara-ore:user:install');
        $this->artisan('migrate');
    }
}
