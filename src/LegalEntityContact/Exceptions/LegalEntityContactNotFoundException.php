<?php

namespace Railken\LaraOre\LegalEntityContact\Exceptions;

class LegalEntityContactNotFoundException extends LegalEntityContactException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITYCONTACT_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
