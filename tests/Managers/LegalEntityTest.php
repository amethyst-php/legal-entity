<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\LegalEntityFaker;
use Amethyst\Managers\LegalEntityManager;
use Amethyst\Tests\BaseTest;
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
