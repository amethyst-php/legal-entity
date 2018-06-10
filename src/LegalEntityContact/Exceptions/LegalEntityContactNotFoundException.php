<?php

namespace Railken\LaraOre\LegalEntityContact\Exceptions;

class LegalEntityContactNotFoundException extends LegalEntityContactException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGAL_ENTITY_CONTACT_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
