<?php

namespace Railken\LaraOre\Tests\LegalEntityContact;

use Illuminate\Support\Facades\File;
use Railken\Bag;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\LegalEntityServiceProvider::class,
        ];
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new bag();
        $bag->set('name', str_random(40));
        return $bag;
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
