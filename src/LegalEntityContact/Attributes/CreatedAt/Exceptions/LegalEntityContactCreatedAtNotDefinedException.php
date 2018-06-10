<?php

namespace Railken\LaraOre\LegalEntityContact\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\LegalEntityContact\Exceptions\LegalEntityContactAttributeException;

class LegalEntityContactCreatedAtNotDefinedException extends LegalEntityContactAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITYCONTACT_CREATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
