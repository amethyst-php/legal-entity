<?php

namespace Railken\LaraOre\LegalEntityContact\Exceptions;

class LegalEntityContactNotAuthorizedException extends LegalEntityContactException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITYCONTACT_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
