<?php

namespace Railken\LaraOre\Tests\LegalEntity;

use Illuminate\Support\Facades\Config;
use Railken\LaraOre\LegalEntity\LegalEntityFaker;
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
        return Config::get('ore.api.router.prefix').Config::get('ore.legal-entity.http.admin.router.prefix');
    }

    /**
     * Test common requests.
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), LegalEntityFaker::make()->parameters());
    }
}
