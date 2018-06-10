<?php

namespace Railken\LaraOre\Tests\LegalEntityContact;

use Railken\LaraOre\LegalEntityContact\LegalEntityContactManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;

class ManagerTest extends BaseTest
{
    use ManagerTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new LegalEntityContactManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), $this->getParameters());
    }

    public function testTaxonomyName()
    {
        $result = $this->getManager()->create($this->getParametersWithTaxonomyName());
        $this->assertEquals(true, $result->ok());
    }
}
