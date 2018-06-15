<?php

namespace Railken\LaraOre\Tests\LegalEntityContact;

use Railken\LaraOre\Support\Testing\ApiTestableTrait;
use Illuminate\Support\Facades\Config;

class ApiTest extends BaseTest
{
    use ApiTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return Config::get('ore.api.router.prefix').Config::get('ore.legal-entity-contact.router.prefix');
    }

    /**
     * Test common requests.
     *
     * @return void
     */
    public function testSuccessCommon()
    {
        $this->signIn();
        $this->commonTest($this->getBaseUrl(), $parameters = $this->getParameters());
    }

    public function testTaxonomyName()
    {
        // POST /
        $response = $this->post($this->getBaseUrl(), $this->getParametersWithTaxonomyName()->toArray());
        $this->assertOrPrint($response, 201);
    }
}
