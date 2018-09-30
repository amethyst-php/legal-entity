<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\LegalEntityContactFaker;
use Railken\Amethyst\Managers\LegalEntityContactManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class LegalEntityContactTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = LegalEntityContactManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = LegalEntityContactFaker::class;
}
