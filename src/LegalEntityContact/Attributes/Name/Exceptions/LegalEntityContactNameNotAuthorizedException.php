<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\Name\Exceptions;

use Railken\LaraOre\LegalEntityContact\Exceptions\LegalEntityContactAttributeException;

class LegalEntityContactNameNotAuthorizedException extends LegalEntityContactAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITYCONTACT_NAME_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
