<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\TaxonomyId\Exceptions;

use Railken\LaraOre\LegalEntityContact\Exceptions\LegalEntityContactAttributeException;

class LegalEntityContactTaxonomyIdNotAuthorizedException extends LegalEntityContactAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'taxonomy_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGAL_ENTITY_CONTACT_TAXONOMY_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
