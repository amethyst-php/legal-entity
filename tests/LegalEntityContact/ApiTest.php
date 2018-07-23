<?php

namespace Railken\LaraOre\Tests\LegalEntityContact;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\LegalEntityContact\LegalEntityContactFaker;
use Railken\LaraOre\Support\Testing\ApiTestableTrait;

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
        return Config::get('ore.api.router.prefix').Config::get('ore.legal-entity-contact.http.admin.router.prefix');
    }

    /**
     * Test common requests.
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), LegalEntityContactFaker::make()->parameters());
    }
}
