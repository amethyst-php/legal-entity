<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\LegalEntityFaker;
use Railken\Amethyst\Managers\LegalEntityManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class LegalEntityTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = LegalEntityManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = LegalEntityFaker::class;
}
