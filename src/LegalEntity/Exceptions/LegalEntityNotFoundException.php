<?php

namespace Railken\LaraOre\LegalEntity\Exceptions;

class LegalEntityNotFoundException extends LegalEntityException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGAL_ENTITY_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
