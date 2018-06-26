<?php

namespace Railken\LaraOre\Tests\LegalEntity;

use Railken\LaraOre\LegalEntity\LegalEntityManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;
use Railken\LaraOre\LegalEntity\LegalEntityFaker;

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
        return new LegalEntityManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), LegalEntityFaker::make());
    }
}
