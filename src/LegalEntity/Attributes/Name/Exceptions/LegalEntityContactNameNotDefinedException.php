<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\Name\Exceptions;

use Railken\LaraOre\LegalEntityContact\Exceptions\LegalEntityContactAttributeException;

class LegalEntityContactNameNotDefinedException extends LegalEntityContactAttributeException
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
    protected $code = 'LEGALENTITYCONTACT_NAME_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
