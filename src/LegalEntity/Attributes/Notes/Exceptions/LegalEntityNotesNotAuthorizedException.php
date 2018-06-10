<?php

namespace Railken\LaraOre\LegalEntity\Attributes\Notes\Exceptions;

use Railken\LaraOre\LegalEntity\Exceptions\LegalEntityAttributeException;

class LegalEntityNotesNotAuthorizedException extends LegalEntityAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'notes';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LEGALENTITY_NOTES_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
