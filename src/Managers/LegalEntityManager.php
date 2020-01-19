<?php

namespace Amethyst\Managers;

use Amethyst\Core\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Models\LegalEntity                 newEntity()
 * @method \Amethyst\Schemas\LegalEntitySchema          getSchema()
 * @method \Amethyst\Repositories\LegalEntityRepository getRepository()
 * @method \Amethyst\Serializers\LegalEntitySerializer  getSerializer()
 * @method \Amethyst\Validators\LegalEntityValidator    getValidator()
 * @method \Amethyst\Authorizers\LegalEntityAuthorizer  getAuthorizer()
 */
class LegalEntityManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.legal-entity.data.legal-entity';
}
